document.addEventListener('DOMContentLoaded', () => {
    // --- STATE MANAGEMENT ---
    let currentDate = new Date();
    let healthData = {}; // Stores daily tracked values
    let monthlyGoals = {}; // Stores default goals for the month
    let dailyGoals = {}; // Stores specific goals for individual days
    
    const defaultMonthlyGoals = { water: 3, sleep: 8, calories: 2200, workout: 45 };
    const defaultDayData = { water: 0, sleep: 0, calories: 0, workout: 0 };
    let editedDateKey = null;

    // --- UI ELEMENTS ---
    const ui = {
        cards: {
            water: document.getElementById('water-current'),
            sleep: document.getElementById('sleep-current'),
            calories: document.getElementById('calories-current'),
            workout: document.getElementById('workout-current'),
        },
        goalDisplays: {
            water: document.getElementById('water-goal-display'),
            sleep: document.getElementById('sleep-goal-display'),
            calories: document.getElementById('calories-goal-display'),
            workout: document.getElementById('workout-goal-display'),
        },
        monthYearTitle: document.getElementById('month-year-title'),
        prevMonthBtn: document.getElementById('prev-month-btn'),
        nextMonthBtn: document.getElementById('next-month-btn'),
        averagesContainer: document.getElementById('averages-container'),
        mobileMenu: document.getElementById('mobile-menu'),
        mobileMenuBtn: document.getElementById('mobile-menu-button'),
        // Buttons for modals
        setMonthlyGoalsBtn: document.getElementById('set-monthly-goals-btn'),
        mobileSetMonthlyGoalsBtn: document.getElementById('mobile-set-monthly-goals-btn'),
        setDailyGoalsBtn: document.getElementById('set-daily-goals-btn'),
        mobileSetDailyGoalsBtn: document.getElementById('mobile-set-daily-goals-btn'),
        // Edit Day Modal
        editModal: {
            overlay: document.getElementById('edit-modal'),
            date: document.getElementById('modal-date'),
            value: {
                water: document.getElementById('modal-value-water'),
                sleep: document.getElementById('modal-value-sleep'),
                calories: document.getElementById('modal-value-calories'),
                workout: document.getElementById('modal-value-workout'),
            },
            goal: {
                water: document.getElementById('modal-goal-water'),
                sleep: document.getElementById('modal-goal-sleep'),
                calories: document.getElementById('modal-goal-calories'),
                workout: document.getElementById('modal-goal-workout'),
            },
            saveBtn: document.getElementById('modal-save-edit'),
            cancelBtn: document.getElementById('modal-cancel-edit'),
        },
        // Monthly Goals Modal
        monthlyGoalsModal: {
            overlay: document.getElementById('monthly-goals-modal'),
            water: document.getElementById('monthly-goal-water'),
            sleep: document.getElementById('monthly-goal-sleep'),
            calories: document.getElementById('monthly-goal-calories'),
            workout: document.getElementById('monthly-goal-workout'),
            saveBtn: document.getElementById('modal-save-monthly-goals'),
            cancelBtn: document.getElementById('modal-cancel-monthly-goals'),
        },
        // Daily Goals Modal
        dailyGoalsModal: {
            overlay: document.getElementById('daily-goals-modal'),
            dateInput: document.getElementById('daily-goal-date'),
            water: document.getElementById('daily-goal-water'),
            sleep: document.getElementById('daily-goal-sleep'),
            calories: document.getElementById('daily-goal-calories'),
            workout: document.getElementById('daily-goal-workout'),
            saveBtn: document.getElementById('modal-save-daily-goals'),
            cancelBtn: document.getElementById('modal-cancel-daily-goals'),
        }
    };

    // --- DATA & LOCAL STORAGE ---
    function loadData() {
        healthData = JSON.parse(localStorage.getItem('monthlyHealthData')) || {};
        monthlyGoals = JSON.parse(localStorage.getItem('userMonthlyGoals')) || { ...defaultMonthlyGoals };
        dailyGoals = JSON.parse(localStorage.getItem('userDailyGoals')) || {};
    }

    function saveData() {
        localStorage.setItem('monthlyHealthData', JSON.stringify(healthData));
        localStorage.setItem('userMonthlyGoals', JSON.stringify(monthlyGoals));
        localStorage.setItem('userDailyGoals', JSON.stringify(dailyGoals));
    }
    
    function getDateKey(date) {
        // Adjust for timezone offset to prevent date changes
        const adjustedDate = new Date(date.getTime() - (date.getTimezoneOffset() * 60000));
        return adjustedDate.toISOString().split('T')[0]; // .+"]),-MM-dd
    }

    function getGoalForDay(metric, dateKey) {
        return dailyGoals[dateKey]?.[metric] ?? monthlyGoals[metric];
    }

    // --- CHART.JS IMPLEMENTATION ---
    let progressChart;
    const chartCanvas = document.getElementById('progressChart');
    const chartCtx = chartCanvas.getContext('2d');

    function initializeChart(month, year) {
        if (progressChart) {
            progressChart.destroy();
        }
    
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const labels = Array.from({ length: daysInMonth }, (_, i) => i + 1);
        
        const getPercentageData = (metric) => {
             return labels.map(day => {
                const dateKey = getDateKey(new Date(year, month, day));
                const value = healthData[dateKey]?.[metric] || 0;
                const goal = getGoalForDay(metric, dateKey);
                return goal > 0 ? (value / goal) * 100 : 0;
            });
        };

        progressChart = new Chart(chartCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    { label: 'Água (% Meta)', data: getPercentageData('water'), backgroundColor: 'rgba(59, 130, 246, 0.7)', borderRadius: 5 },
                    { label: 'Sono (% Meta)', data: getPercentageData('sleep'), backgroundColor: 'rgba(129, 140, 248, 0.7)', borderRadius: 5 },
                    { label: 'Calorias (% Meta)', data: getPercentageData('calories'), backgroundColor: 'rgba(251, 146, 60, 0.7)', borderRadius: 5 },
                    { label: 'Exercício (% Meta)', data: getPercentageData('workout'), backgroundColor: 'rgba(74, 222, 128, 0.7)', borderRadius: 5 }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { 
                        beginAtZero: true, 
                        max: 120, 
                        ticks: { 
                            callback: (v) => v + '%' 
                        } 
                    } 
                },
                plugins: { 
                    tooltip: { 
                        callbacks: { 
                            label: (c) => `${c.dataset.label || ''}: ${c.parsed.y.toFixed(0)}%` 
                        } 
                    } 
                },
                onClick: (e) => {
                    const activePoints = progressChart.getElementsAtEventForMode(e, 'nearest', { intersect: true }, true);
                    if (activePoints.length > 0) {
                        const dayIndex = activePoints[0].index;
                        const selectedDate = new Date(year, month, dayIndex + 1);
                        openEditModal(selectedDate);
                    }
                }
            }
        });
    }

    // --- MODALS ---
    function openEditModal(date) {
        editedDateKey = getDateKey(date);
        const dayData = healthData[editedDateKey] || { ...defaultDayData };
        
        ui.editModal.date.textContent = date.toLocaleDateString('pt-BR', { day: '2-digit', month: 'long', year: 'numeric' });
        
        Object.keys(dayData).forEach(key => ui.editModal.value[key].value = dayData[key] );
        Object.keys(monthlyGoals).forEach(key => ui.editModal.goal[key].value = getGoalForDay(key, editedDateKey) );

        ui.editModal.overlay.classList.add('active');
    }

    function closeEditModal() {
        ui.editModal.overlay.classList.remove('active');
        editedDateKey = null;
    }

    function handleSaveEditModal() {
        if (!editedDateKey) return;
        healthData[editedDateKey] = {
            water: parseFloat(ui.editModal.value.water.value) || 0,
            sleep: parseFloat(ui.editModal.value.sleep.value) || 0,
            calories: parseInt(ui.editModal.value.calories.value) || 0,
            workout: parseInt(ui.editModal.value.workout.value) || 0,
        };

        if (!dailyGoals[editedDateKey]) dailyGoals[editedDateKey] = {};
        Object.keys(monthlyGoals).forEach(key => {
            const dailyGoalValue = parseFloat(ui.editModal.goal[key].value) || 0;
            if (dailyGoalValue !== monthlyGoals[key]) {
                dailyGoals[editedDateKey][key] = dailyGoalValue;
            } else {
                delete dailyGoals[editedDateKey][key];
            }
        });
        if (Object.keys(dailyGoals[editedDateKey]).length === 0) delete dailyGoals[editedDateKey];

        saveData();
        renderDashboard();
        closeEditModal();
    }
    
    function openMonthlyGoalsModal() {
        Object.keys(monthlyGoals).forEach(key => ui.monthlyGoalsModal[key].value = monthlyGoals[key] );
        ui.monthlyGoalsModal.overlay.classList.add('active');
    }

    function closeMonthlyGoalsModal() {
        ui.monthlyGoalsModal.overlay.classList.remove('active');
    }

    function handleSaveMonthlyGoalsModal() {
        monthlyGoals.water = parseFloat(ui.monthlyGoalsModal.water.value) || defaultMonthlyGoals.water;
        monthlyGoals.sleep = parseFloat(ui.monthlyGoalsModal.sleep.value) || defaultMonthlyGoals.sleep;
        monthlyGoals.calories = parseInt(ui.monthlyGoalsModal.calories.value) || defaultMonthlyGoals.calories;
        monthlyGoals.workout = parseInt(ui.monthlyGoalsModal.workout.value) || defaultMonthlyGoals.workout;
        
        saveData();
        renderDashboard();
        closeMonthlyGoalsModal();
    }
    
    function openDailyGoalsModal() {
        ui.dailyGoalsModal.dateInput.value = getDateKey(new Date());
        updateDailyGoalsPlaceholders();
        ui.dailyGoalsModal.overlay.classList.add('active');
    }

    function closeDailyGoalsModal() {
        ui.dailyGoalsModal.overlay.classList.remove('active');
    }

    function updateDailyGoalsPlaceholders() {
        const selectedDateKey = ui.dailyGoalsModal.dateInput.value;
        Object.keys(monthlyGoals).forEach(key => {
            const goal = getGoalForDay(key, selectedDateKey);
            ui.dailyGoalsModal[key].value = dailyGoals[selectedDateKey]?.[key] || '';
            ui.dailyGoalsModal[key].placeholder = `Padrão: ${goal}`;
        });
    }

    function handleSaveDailyGoalsModal() {
        const selectedDateKey = ui.dailyGoalsModal.dateInput.value;
        if (!selectedDateKey) return;

        if (!dailyGoals[selectedDateKey]) dailyGoals[selectedDateKey] = {};
        Object.keys(monthlyGoals).forEach(key => {
            const inputElement = ui.dailyGoalsModal[key];
            if (inputElement.value) {
                dailyGoals[selectedDateKey][key] = parseFloat(inputElement.value);
            } else {
                delete dailyGoals[selectedDateKey][key];
            }
        });
        if (Object.keys(dailyGoals[selectedDateKey]).length === 0) delete dailyGoals[selectedDateKey];
        
        saveData();
        renderDashboard();
        closeDailyGoalsModal();
    }

    // --- RENDER & UPDATE ---
    function renderDashboard() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();

        ui.monthYearTitle.textContent = currentDate.toLocaleDateString('pt-BR', { month: 'long', year: 'numeric' }).replace(/^\w/, c => c.toUpperCase());

        const todayKey = getDateKey(new Date());
        const todayData = healthData[todayKey] || { ...defaultDayData };
        
        Object.keys(ui.cards).forEach(key => {
            if (ui.cards[key]) {
                ui.cards[key].textContent = parseFloat(todayData[key].toFixed(2));
                ui.goalDisplays[key].textContent = getGoalForDay(key, todayKey);
            }
        });

        initializeChart(month, year);
        renderAverages(month, year);
    }
    
    function renderAverages(month, year) {
        const relevantKeys = Object.keys(healthData).filter(key => key.startsWith(`${year}-${String(month + 1).padStart(2, '0')}`));
        const daysWithData = relevantKeys.length || 1; 

        const totals = { water: 0, sleep: 0, calories: 0, workout: 0 };
        relevantKeys.forEach(key => {
            Object.keys(totals).forEach(metric => {
                totals[metric] += healthData[key][metric] || 0;
            });
        });
        
        const averages = {
            water: (totals.water / daysWithData).toFixed(1),
            sleep: (totals.sleep / daysWithData).toFixed(1),
            calories: (totals.calories / daysWithData).toFixed(0),
            workout: (totals.workout / daysWithData).toFixed(0),
        };

        const metricNames = { water: 'Água', sleep: 'Sono', calories: 'Calorias', workout: 'Exercício' };
        const averageIcons = {
            water: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path></svg>`,
            sleep: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21a9 9 0 1 1 0-18Z"></path><path d="M8 11.37A6 6 0 0 1 18 10h-6Z"></path></svg>`,
            calories: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 10.5c-2.2.6-4.5.4-6.5-1.5-2.1-2-2.1-5.5 0-7.5 2-2 5.4-2.1 7.5 0 .1.1.2.2.3.3.4.4.7.9.9 1.4.3 1 .2 2.2-.4 3.2l-1.3 1.6"></path><path d="m11 11.5 1.5 1.5c.6.5 1.4.7 2.1.5l3.2-.8c.9-.2 1.8.3 2.2 1.1l.2.5c.5 1.2.3 2.6-.6 3.7C18 19.2 16.1 20 14.5 20c-2.3 0-4.5-1.1-6-3-1.5-1.8-1.5-4.4 0-6.2 1.2-1.5 3-2.3 4.8-2.3"></path></svg>`,
            workout: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13.4 2.6 3 14h9l-1 8 10.4-11.4H11l1-8z"></path></svg>`
        };
        
        ui.averagesContainer.innerHTML = Object.keys(averages).map(key => {
            const unit = key === 'water' ? 'L' : key === 'sleep' ? 'h' : key === 'calories' ? 'kcal' : 'min';
            return `<div class="card">${averageIcons[key]}<div><p>Média de ${metricNames[key] || key}</p><p>${averages[key]} ${unit}</p></div></div>`;
        }).join('');
    }
    
    // --- GLOBAL API & EVENTS ---
    window.updateMetric = (metric, amount) => {
        const todayKey = getDateKey(new Date());
        if (!healthData[todayKey]) healthData[todayKey] = { ...defaultDayData };
        const currentValue = healthData[todayKey][metric] || 0;
        healthData[todayKey][metric] = Math.max(0, currentValue + amount);
        saveData();
        renderDashboard();
    };
    
    ui.prevMonthBtn.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderDashboard();
    });

    ui.nextMonthBtn.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderDashboard();
    });

    // Modal Listeners
    ui.editModal.saveBtn.addEventListener('click', handleSaveEditModal);
    ui.editModal.cancelBtn.addEventListener('click', closeEditModal);

    ui.setMonthlyGoalsBtn.addEventListener('click', openMonthlyGoalsModal);
    ui.mobileSetMonthlyGoalsBtn.addEventListener('click', openMonthlyGoalsModal);
    ui.monthlyGoalsModal.saveBtn.addEventListener('click', handleSaveMonthlyGoalsModal);
    ui.monthlyGoalsModal.cancelBtn.addEventListener('click', closeMonthlyGoalsModal);

    ui.setDailyGoalsBtn.addEventListener('click', openDailyGoalsModal);
    ui.mobileSetDailyGoalsBtn.addEventListener('click', openDailyGoalsModal);
    ui.dailyGoalsModal.saveBtn.addEventListener('click', handleSaveDailyGoalsModal);
    ui.dailyGoalsModal.cancelBtn.addEventListener('click', closeDailyGoalsModal);
    ui.dailyGoalsModal.dateInput.addEventListener('change', updateDailyGoalsPlaceholders);


    ui.mobileMenuBtn.addEventListener('click', () => ui.mobileMenu.classList.toggle('active') );

    // --- INITIALIZATION ---
    function init() {
        loadData();
        renderDashboard();
    }

    init();
});
