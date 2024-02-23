INSERT INTO public.author ("name") VALUES
	 ('Ali Hazelwood'),
	 ('Charlie Angus'),
	 ('Celia del Palacio Montiel'),
	 ('David Grann'),
	 ('David Solar'),
	 ('Geetanjali Shree'),
	 ('Laura Lovecraft'),
	 ('Laura Clery'),
	 ('Darby Costello'),
	 ('Kitty Flanagan');
INSERT INTO public.author ("name") VALUES
	 ('Carlos del Amor');



INSERT INTO public.category ("name") VALUES
	 ('Romance'),
	 ('Terror'),
	 ('Sociedad y ciencias sociales'),
	 ('Fiction Fantasy Adventure Sci-fi'),
	 ('True Crime American History Law Enforcement'),
	 ('Fiction Romance Historical Fiction Drama'),
	 ('Relationships Parenting Motherhood'),
	 ('Self-help Astrology'),
	 ('Self-help Personal development Motivation'),
	 ('Arte y entretenimiento');
INSERT INTO public.category ("name") VALUES
	 ('Ficción Suspenso'),
	 ('Misterio Psicológico');

INSERT INTO public.book (title,description,cover,publication_year,isbn,publisher) VALUES
	 ('Cobalt - Cradle of the Demon Metals, Birth of a Mining Superpower','The world is desperate for cobalt. It drives the proliferation of digital and clean technologies. But this “demon metal” has a horrific present and a troubled history. The modern search for cobalt has brought investors back to a small town in Northern Canada, a place called Cobalt. Like the demon metal, this town has a dark and turbulent history. ','https://cdnagesdb.com/images/booksimages/12AAA2CF9E47D205BE62CDC856B2069F.webp',2021,'9781487009502','House of Anansi Press'),
	 ('The Love Hypothesis A Novel plus bonus 16th chapter','A Ph.D. candidates well-calculated theories on love are thrown into disarray when she finds herself in a fake relationship with a scientist who becomes irresistible to her. Olive Smith, a third-year candidate, doesnt believe in long-lasting love, but to appease her best friend, she convinces Adam Carlsen, a young and handsome professor, to be her fake boyfriend.','https://isbncoverdb.com/images/book-cover-the-love-hypothesis-a-novel-plus-bonus.webp',2022,'2020057346',NULL),
	 ('Violencia y periodismo regional','El impacto de la violencia criminal de diversas regiones de México en el ejercicio del periodismo se ha incrementado en las últimas décadas.','https://isbncoverdb.com/images/book-cover-violencia-y-periodismo-regional.webp',2015,'9786077113119','Juan Pablos Editor'),
	 ('Z, la ciudad perdida','David Grann reconstruye en esta fascinante novela la misteriosa historia del explorador Percy Fawcett, desaparecido durante la última expedición en busca de El Dorado','https://isbncoverdb.com/images/book-cover-z-la-ciudad-perdida.webp',2017,'9788439733102',NULL),
	 ('Killers of the Flower Moon : The Osage Murders and the Birth of the FBI','In the 1920s, the richest people per capita in the world were members of the Osage Indian nation in Oklahoma.','https://isbncoverdb.com/images/book-cover-killers-of-the-flower-moon-.webp',2017,'9780385534253','Knopf Doubleday Publishing Group'),
	 ('La caída de los dioses','El 21 de junio de 1940, cuando Francia capituló en Compiègne, Hitler había ganado la guerra. Aparte del territorio del Reich, dominaba Noruega, Polonia, Checoslovaquia, Países Bajos, Bélgica y Francia. Era aliado de Italia y tenía relaciones muy amistosas con Franco, que le debía la victoria en la guerra civil.','https://isbncoverdb.com/images/book-cover-la-cada-de-los-dioses.webp',2005,'9780384544253','ePubLibre'),
	 ('The Roof Beneath Their Feet','Relatos de romance.','https://isbncoverdb.com/images/book-cover-the-roof-beneath-their-feet.webp',2013,'9789350296318','HarperPerennial'),
	 ('Mom’s All Yours','Moms all yours is a special day James mother created when he was a kid; one day a year mom does whatever he asks her to.','https://isbncoverdb.com/images/book-cover-moms-all-yours.webp',2013,'9889350296343','HarperPerennial'),
	 ('Idiots : Marriage, Motherhood, Milk & Mistakes','TRIGGER WARNING: TORN EVERYTHING! In her first book, Idiot, bestselling author Laura Clery gave us mind-blowingly personal life stories about addiction, toxic relationships, and recovery—establishing herself as the preeminent voice of infinite conviction meets zero impulse control.','https://isbncoverdb.com/images/book-cover-idiots-.webp',2022,'9781982167127','Gallery Books'),
	 ('The Astrological Moon','Throughout her astrological career, Darby Costello has been watching the progressed Moon as it moves through the signs and the houses of the birth chart.','https://isbncoverdb.com/images/book-cover-the-astrological-moon.webp',2017,'0984047492','Raven Dreams Productions, LLC');
INSERT INTO public.book (title,description,cover,publication_year,isbn,publisher) VALUES
	 ('The Rules for Life Omnibus','The Rules for Life Omnibus is Kitty Flanagans way of making the world a more pleasant place to live. Providing you with the antidote to every annoying little thing, these rules are not made to be broken.','https://isbncoverdb.com/images/book-cover-the-rules-for-life-omnibus.webp',2022,'9781761185946','Allen & Unwin'),
	 ('Emocionarte: La doble vida de los cuadros','Con un estilo literario y profundamente divulgativo, seductor y personal, Carlos del Amor nos ofrece un viaje por treinta y cinco obras de todos los tiempos, con especial atención a la pintura femenina y a la española.','https://isbncoverdb.com/images/book-cover-emocionarte.webp',2020,'9781761135948','Espasa'),
	 ('Confabulación','Relatos de misterio.','https://cdnagesdb.com/images/fictionimages/BC5FB1CA9DBAA6CE183991A32353BB45.webp',2017,'9582731165948','ePubLibre');

INSERT INTO public.book_author (id_book,id_author) VALUES
	 (1,1),
	 (2,2),
	 (3,3),
	 (4,4),
	 (5,4),
	 (6,6),
	 (7,7),
	 (8,8),
	 (9,9),
	 (10,10);
INSERT INTO public.book_author (id_book,id_author) VALUES
	 (11,11),
	 (12,12),
	 (13,12);

INSERT INTO public.book_category (id_book,id_category) VALUES
	 (1,1),
	 (2,2),
	 (3,3),
	 (4,4),
	 (5,5),
	 (6,6),
	 (7,6),
	 (8,1),
	 (9,8),
	 (10,9);
INSERT INTO public.book_category (id_book,id_category) VALUES
	 (11,10),
	 (12,11),
	 (13,12),
	 (13,13);
