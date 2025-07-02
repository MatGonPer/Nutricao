CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
DROP TABLE IF EXISTS public.usuario;

\echo 'Criando a tabela usuário...'

CREATE TABLE public.usuario (
    id uuid NOT NULL DEFAULT uuid_generate_v4(),
    nome character varying(100) NOT NULL,
    sexo character(1) NOT NULL,
    data_de_nascimento date NOT NULL,
    email character varying(255) NOT NULL,
    senha character varying(255) NOT NULL,
    data_de_cadastro timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    tipo_usuario character varying(50) NOT NULL,
    status boolean DEFAULT true,
    telefone character varying(20),
    sobre_mim text,
    peso numeric(5,2),
    altura numeric(4,2),
    foto text,
    CONSTRAINT usuario_pkey PRIMARY KEY (id),
    CONSTRAINT usuario_email_key UNIQUE (email),
    CONSTRAINT tipo_usuario_check CHECK (
        tipo_usuario::text = ANY (
            ARRAY[
                'administrador'::character varying, 
                'usuario'::character varying, 
                'nutricionista'::character varying, 
                'personal'::character varying
            ]::text[]
        )
    )
);

\echo 'Tabela "usuario" criada com sucesso.'
