-- Active: 1731321842585@@127.0.0.1@5432@lpse
--
-- PostgreSQL database dump
--

-- Dumped from database version 10.23
-- Dumped by pg_dump version 10.23

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

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: nhn_migrations; Type: TABLE; Schema: public; Owner: geolandm
--

CREATE TABLE public.nhn_migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.nhn_migrations OWNER TO geolandm;

--
-- Name: nhn_migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: geolandm
--

CREATE SEQUENCE public.nhn_migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nhn_migrations_id_seq OWNER TO geolandm;

--
-- Name: nhn_migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: geolandm
--

ALTER SEQUENCE public.nhn_migrations_id_seq OWNED BY public.nhn_migrations.id;


--
-- Name: nhn_migrations id; Type: DEFAULT; Schema: public; Owner: geolandm
--

ALTER TABLE ONLY public.nhn_migrations ALTER COLUMN id SET DEFAULT nextval('public.nhn_migrations_id_seq'::regclass);


--
-- Name: nhn_migrations nhn_migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: geolandm
--

ALTER TABLE ONLY public.nhn_migrations
    ADD CONSTRAINT nhn_migrations_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

