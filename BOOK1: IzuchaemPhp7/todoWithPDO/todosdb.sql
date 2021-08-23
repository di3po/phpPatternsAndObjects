--
-- PostgreSQL database dump
--

-- Dumped from database version 13.4 (Debian 13.4-1.pgdg100+1)
-- Dumped by pg_dump version 13.4 (Debian 13.4-1.pgdg100+1)

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

SET default_table_access_method = heap;

--
-- Name: todos; Type: TABLE; Schema: public; Owner: someuser
--

CREATE TABLE public.todos (
    todo_id integer,
    todo_name character varying(255),
    todo_status boolean
);


ALTER TABLE public.todos OWNER TO someuser;

--
-- Data for Name: todos; Type: TABLE DATA; Schema: public; Owner: someuser
--

COPY public.todos (todo_id, todo_name, todo_status) FROM stdin;
\.


--
-- PostgreSQL database dump complete
--

