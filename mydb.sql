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
-- Name: clients; Type: TABLE; Schema: public; Owner: someuser
--

CREATE TABLE public.clients (
    id integer NOT NULL,
    name character varying(40) NOT NULL,
    age integer NOT NULL
);


ALTER TABLE public.clients OWNER TO someuser;

--
-- Name: dishes; Type: TABLE; Schema: public; Owner: someuser
--

CREATE TABLE public.dishes (
    dish_id integer,
    dish_name character varying(255),
    price numeric(4,2),
    is_spicy integer
);


ALTER TABLE public.dishes OWNER TO someuser;

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
-- Data for Name: clients; Type: TABLE DATA; Schema: public; Owner: someuser
--

COPY public.clients (id, name, age) FROM stdin;
4	Alice	45
0	Damon	70
\.


--
-- Data for Name: dishes; Type: TABLE DATA; Schema: public; Owner: someuser
--

COPY public.dishes (dish_id, dish_name, price, is_spicy) FROM stdin;
\N	Pizza	1.25	0
\.


--
-- Data for Name: todos; Type: TABLE DATA; Schema: public; Owner: someuser
--

COPY public.todos (todo_id, todo_name, todo_status) FROM stdin;
\N	smile	f
\N	aaa	f
\N	aaa	f
\N	aaa	f
\N	aaa	f
\N	aaa	f
\N	bbb	f
\N		f
\N		f
\N		f
\N		f
\N		f
\N		f
\N	first	f
\N	second	f
\N	third	f
\N	third	f
\N	fourth	f
\N	fifth	f
\N	sixth	f
\N	seventh	f
\.


--
-- Name: clients firstkey; Type: CONSTRAINT; Schema: public; Owner: someuser
--

ALTER TABLE ONLY public.clients
    ADD CONSTRAINT firstkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

