--
-- PostgreSQL database dump
--

-- Dumped from database version 12.7
-- Dumped by pg_dump version 12.7

-- Started on 2021-07-26 17:05:15

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
-- TOC entry 202 (class 1259 OID 16502)
-- Name: doctrine_migration_versions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.doctrine_migration_versions (
    version character varying(191) NOT NULL,
    executed_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    execution_time integer
);


ALTER TABLE public.doctrine_migration_versions OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16516)
-- Name: ratings; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ratings (
    id integer NOT NULL,
    rating_value integer NOT NULL,
    user_id integer NOT NULL,
    song_id integer NOT NULL
);


ALTER TABLE public.ratings OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16510)
-- Name: ratings_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ratings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ratings_id_seq OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 16521)
-- Name: songs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.songs (
    id integer NOT NULL,
    name character varying(255) NOT NULL
);


ALTER TABLE public.songs OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16512)
-- Name: songs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.songs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.songs_id_seq OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 16564)
-- Name: user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."user" (
    id integer NOT NULL,
    email character varying(180) NOT NULL,
    roles json NOT NULL,
    password character varying(255) NOT NULL,
    user_name character varying(180) NOT NULL
);


ALTER TABLE public."user" OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 16555)
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16514)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 2843 (class 0 OID 16502)
-- Dependencies: 202
-- Data for Name: doctrine_migration_versions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.doctrine_migration_versions (version, executed_at, execution_time) FROM stdin;
DoctrineMigrations\\Version20210723170539	2021-07-23 17:06:02	42
DoctrineMigrations\\Version20210723185049	2021-07-23 18:51:26	25
DoctrineMigrations\\Version20210723185515	2021-07-23 18:55:34	21
DoctrineMigrations\\Version20210723185932	2021-07-23 18:59:54	23
DoctrineMigrations\\Version20210723190334	2021-07-23 19:04:47	23
DoctrineMigrations\\Version20210724071419	2021-07-24 07:42:55	36
DoctrineMigrations\\Version20210724074203	2021-07-24 07:42:56	18
DoctrineMigrations\\Version20210724180421	2021-07-24 18:06:18	42
DoctrineMigrations\\Version20210725095806	2021-07-25 10:00:24	27
\.


--
-- TOC entry 2847 (class 0 OID 16516)
-- Dependencies: 206
-- Data for Name: ratings; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ratings (id, rating_value, user_id, song_id) FROM stdin;
12	6	9	14
13	5	8	14
14	9	8	12
15	1	8	16
16	9	8	17
17	3	9	17
18	3	10	17
19	2	9	18
20	1	8	18
\.


--
-- TOC entry 2848 (class 0 OID 16521)
-- Dependencies: 207
-- Data for Name: songs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.songs (id, name) FROM stdin;
12	Smells Like Teen Spirit
13	Doo-Wop (That Thing)
14	Vanilla Ice Ice Ice Baby
15	Kiss From A Rose
18	aaa
19	bbb
\.


--
-- TOC entry 2850 (class 0 OID 16564)
-- Dependencies: 209
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."user" (id, email, roles, password, user_name) FROM stdin;
8	danielkaaaos@gmail.com	["ROLE_USER"]	$2y$13$ZlSowUEfvgYPHVvM29T73ejAB3uPcAXyidZ17fxnevuiVft3NmVXC	DanielKaoos
9	alexisonfire@abv.bg	["ROLE_USER"]	$2y$13$2/OS3kWHJijQywaV1A8Nku5NCyVqzbZQRMfnviD4kYmLBa/U3t8ii	Alex
10	email@email.com	["ROLE_USER"]	$2y$13$nnrsAyk941abXgVwDofGxeUfZu/leXCgug88QnLeGGTHwh7c4sBMa	name
\.


--
-- TOC entry 2856 (class 0 OID 0)
-- Dependencies: 203
-- Name: ratings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ratings_id_seq', 20, true);


--
-- TOC entry 2857 (class 0 OID 0)
-- Dependencies: 204
-- Name: songs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.songs_id_seq', 19, true);


--
-- TOC entry 2858 (class 0 OID 0)
-- Dependencies: 208
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.user_id_seq', 10, true);


--
-- TOC entry 2859 (class 0 OID 0)
-- Dependencies: 205
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


--
-- TOC entry 2708 (class 2606 OID 16507)
-- Name: doctrine_migration_versions doctrine_migration_versions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doctrine_migration_versions
    ADD CONSTRAINT doctrine_migration_versions_pkey PRIMARY KEY (version);


--
-- TOC entry 2710 (class 2606 OID 16520)
-- Name: ratings ratings_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ratings
    ADD CONSTRAINT ratings_pkey PRIMARY KEY (id);


--
-- TOC entry 2712 (class 2606 OID 16525)
-- Name: songs songs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.songs
    ADD CONSTRAINT songs_pkey PRIMARY KEY (id);


--
-- TOC entry 2716 (class 2606 OID 16571)
-- Name: user user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- TOC entry 2713 (class 1259 OID 16612)
-- Name: uniq_8d93d64924a232cf; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX uniq_8d93d64924a232cf ON public."user" USING btree (user_name);


--
-- TOC entry 2714 (class 1259 OID 16572)
-- Name: uniq_8d93d649e7927c74; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX uniq_8d93d649e7927c74 ON public."user" USING btree (email);


-- Completed on 2021-07-26 17:05:15

--
-- PostgreSQL database dump complete
--

