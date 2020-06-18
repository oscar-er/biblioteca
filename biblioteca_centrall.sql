--
-- PostgreSQL database dump
--

-- Dumped from database version 12.2
-- Dumped by pg_dump version 12.0

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: registros_biblioteca; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA registros_biblioteca;


ALTER SCHEMA registros_biblioteca OWNER TO postgres;

--
-- Name: SCHEMA registros_biblioteca; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA registros_biblioteca IS 'Esquema de registros de la biblioteca';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: registros; Type: TABLE; Schema: registros_biblioteca; Owner: postgres
--

CREATE TABLE registros_biblioteca.registros (
    id_alumno integer NOT NULL,
    primer_nombre character varying(45) NOT NULL,
    otros_nombres character varying(70),
    apellido_paterno character varying(45),
    apellido_materno character varying(45) NOT NULL,
    fecha_nacimiento date NOT NULL,
    instituto character varying(170) NOT NULL,
    nivel_academico character varying(45) NOT NULL,
    telefono character varying(10),
    domicilio character varying(190)
);


ALTER TABLE registros_biblioteca.registros OWNER TO postgres;

--
-- Name: TABLE registros; Type: COMMENT; Schema: registros_biblioteca; Owner: postgres
--

COMMENT ON TABLE registros_biblioteca.registros IS 'Registro de visitas a la biblioteca';


--
-- Name: registros_id_alumno_seq; Type: SEQUENCE; Schema: registros_biblioteca; Owner: postgres
--

CREATE SEQUENCE registros_biblioteca.registros_id_alumno_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE registros_biblioteca.registros_id_alumno_seq OWNER TO postgres;

--
-- Name: registros_id_alumno_seq; Type: SEQUENCE OWNED BY; Schema: registros_biblioteca; Owner: postgres
--

ALTER SEQUENCE registros_biblioteca.registros_id_alumno_seq OWNED BY registros_biblioteca.registros.id_alumno;


--
-- Name: reservas; Type: TABLE; Schema: registros_biblioteca; Owner: postgres
--

CREATE TABLE registros_biblioteca.reservas (
    id_reserva integer NOT NULL,
    id_alumno integer NOT NULL,
    fecha_reserva date NOT NULL
);


ALTER TABLE registros_biblioteca.reservas OWNER TO postgres;

--
-- Name: TABLE reservas; Type: COMMENT; Schema: registros_biblioteca; Owner: postgres
--

COMMENT ON TABLE registros_biblioteca.reservas IS 'Registro de reservaciones de visitas';


--
-- Name: reservas_id_reserva_seq; Type: SEQUENCE; Schema: registros_biblioteca; Owner: postgres
--

CREATE SEQUENCE registros_biblioteca.reservas_id_reserva_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE registros_biblioteca.reservas_id_reserva_seq OWNER TO postgres;

--
-- Name: reservas_id_reserva_seq; Type: SEQUENCE OWNED BY; Schema: registros_biblioteca; Owner: postgres
--

ALTER SEQUENCE registros_biblioteca.reservas_id_reserva_seq OWNED BY registros_biblioteca.reservas.id_reserva;


--
-- Name: usuarios; Type: TABLE; Schema: registros_biblioteca; Owner: postgres
--

CREATE TABLE registros_biblioteca.usuarios (
    usuario character varying(30) NOT NULL,
    contrasenia character varying(255) NOT NULL
);


ALTER TABLE registros_biblioteca.usuarios OWNER TO postgres;

--
-- Name: TABLE usuarios; Type: COMMENT; Schema: registros_biblioteca; Owner: postgres
--

COMMENT ON TABLE registros_biblioteca.usuarios IS 'Registro de usuarios al sistema';


--
-- Name: visitas; Type: TABLE; Schema: registros_biblioteca; Owner: postgres
--

CREATE TABLE registros_biblioteca.visitas (
    id_registro integer NOT NULL,
    id_alumno integer NOT NULL,
    fecha_registro date,
    motivo character varying(190)
);


ALTER TABLE registros_biblioteca.visitas OWNER TO postgres;

--
-- Name: TABLE visitas; Type: COMMENT; Schema: registros_biblioteca; Owner: postgres
--

COMMENT ON TABLE registros_biblioteca.visitas IS 'Registro de visitas de alumnos a la biblioteca';


--
-- Name: visitas_id_registro_seq; Type: SEQUENCE; Schema: registros_biblioteca; Owner: postgres
--

CREATE SEQUENCE registros_biblioteca.visitas_id_registro_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE registros_biblioteca.visitas_id_registro_seq OWNER TO postgres;

--
-- Name: visitas_id_registro_seq; Type: SEQUENCE OWNED BY; Schema: registros_biblioteca; Owner: postgres
--

ALTER SEQUENCE registros_biblioteca.visitas_id_registro_seq OWNED BY registros_biblioteca.visitas.id_registro;


--
-- Name: registros id_alumno; Type: DEFAULT; Schema: registros_biblioteca; Owner: postgres
--

ALTER TABLE ONLY registros_biblioteca.registros ALTER COLUMN id_alumno SET DEFAULT nextval('registros_biblioteca.registros_id_alumno_seq'::regclass);


--
-- Name: reservas id_reserva; Type: DEFAULT; Schema: registros_biblioteca; Owner: postgres
--

ALTER TABLE ONLY registros_biblioteca.reservas ALTER COLUMN id_reserva SET DEFAULT nextval('registros_biblioteca.reservas_id_reserva_seq'::regclass);


--
-- Name: visitas id_registro; Type: DEFAULT; Schema: registros_biblioteca; Owner: postgres
--

ALTER TABLE ONLY registros_biblioteca.visitas ALTER COLUMN id_registro SET DEFAULT nextval('registros_biblioteca.visitas_id_registro_seq'::regclass);


--
-- Name: registros registros_pkey; Type: CONSTRAINT; Schema: registros_biblioteca; Owner: postgres
--

ALTER TABLE ONLY registros_biblioteca.registros
    ADD CONSTRAINT registros_pkey PRIMARY KEY (id_alumno);


--
-- Name: reservas reservas_pkey; Type: CONSTRAINT; Schema: registros_biblioteca; Owner: postgres
--

ALTER TABLE ONLY registros_biblioteca.reservas
    ADD CONSTRAINT reservas_pkey PRIMARY KEY (id_reserva);


--
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: registros_biblioteca; Owner: postgres
--

ALTER TABLE ONLY registros_biblioteca.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (usuario);


--
-- Name: visitas visitas_pkey; Type: CONSTRAINT; Schema: registros_biblioteca; Owner: postgres
--

ALTER TABLE ONLY registros_biblioteca.visitas
    ADD CONSTRAINT visitas_pkey PRIMARY KEY (id_registro);


--
-- Name: reservas id_alumno_fkey; Type: FK CONSTRAINT; Schema: registros_biblioteca; Owner: postgres
--

ALTER TABLE ONLY registros_biblioteca.reservas
    ADD CONSTRAINT id_alumno_fkey FOREIGN KEY (id_alumno) REFERENCES registros_biblioteca.registros(id_alumno) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: visitas id_alumno_fkey; Type: FK CONSTRAINT; Schema: registros_biblioteca; Owner: postgres
--

ALTER TABLE ONLY registros_biblioteca.visitas
    ADD CONSTRAINT id_alumno_fkey FOREIGN KEY (id_alumno) REFERENCES registros_biblioteca.registros(id_alumno) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- PostgreSQL database dump complete
--

