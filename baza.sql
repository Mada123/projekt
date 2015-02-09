-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Lut 2015, 20:22
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `s178212`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
`id` int(10) unsigned NOT NULL,
  `imdbid` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `aka` text NOT NULL,
  `year` smallint(4) unsigned NOT NULL,
  `duration` smallint(4) unsigned NOT NULL,
  `rating` double NOT NULL,
  `languages` text NOT NULL,
  `country` text NOT NULL,
  `genres` text NOT NULL,
  `director` text NOT NULL,
  `writer` text NOT NULL,
  `producer` text NOT NULL,
  `music` text NOT NULL,
  `cast` text NOT NULL,
  `taglines` text NOT NULL,
  `plotoutline` text NOT NULL,
  `plots` text NOT NULL,
  `format` varchar(32) NOT NULL,
  `own` tinyint(1) NOT NULL DEFAULT '1',
  `seen` tinyint(1) NOT NULL DEFAULT '1',
  `notes` text NOT NULL,
  `loaned` tinyint(1) NOT NULL DEFAULT '0',
  `loandate` date NOT NULL DEFAULT '0000-00-00',
  `loanname` varchar(100) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trailer` varchar(255) NOT NULL,
  `subtitles` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `movies`
--

INSERT INTO `movies` (`id`, `imdbid`, `name`, `aka`, `year`, `duration`, `rating`, `languages`, `country`, `genres`, `director`, `writer`, `producer`, `music`, `cast`, `taglines`, `plotoutline`, `plots`, `format`, `own`, `seen`, `notes`, `loaned`, `loandate`, `loanname`, `added`, `trailer`, `subtitles`, `audio`, `video`) VALUES
(2, '1190080', '2012', '2012\r\n2012 - Das Ende der Welt\r\n2012 mu yat yu yin\r\n2012 Yugantham\r\nAzhivin Aarambam\r\nMahapralaya\r\n2012: An IMAX Experience 3D\r\nFarewell Atlantis', 2009, 158, 5.8, 'English\r\nFrench\r\nTibetan\r\nMandarin\r\nRussian\r\nHindi\r\nPortuguese\r\nLatin\r\nItalian', 'USA', 'Action\r\nAdventure\r\nSci-Fi', 'Roland Emmerich', 'Roland Emmerich\r\nHarald Kloser', 'Aaron Boyd\r\nRoland Emmerich\r\nUte Emmerich\r\nVolker Engel\r\nLarry J. Franco\r\nMark Gordon\r\nHarald Kloser\r\nMarc Weigert\r\nMichael Wimer\r\nKirstin Winkler', 'Harald Kloser\r\nThomas Wanker', 'John Cusack\r\nAmanda Peet\r\nChiwetel Ejiofor\r\nThandie Newton\r\nOliver Platt\r\nThomas McCarthy\r\nWoody Harrelson\r\nDanny Glover\r\nLiam James\r\nMorgan Lily\r\nZlatko Buric\r\nBeatrice Rosen\r\nAlexandre Haussmann\r\nPhilippe Haussmann\r\nJohann Urb\r\nJohn Billingsley\r\nChin Han\r\nOsric Chau\r\nTseng Chang\r\nLisa Lu\r\nBlu Mankuma\r\nGeorge Segal\r\nStephen McHattie\r\nPatrick Bauchau\r\nJimi Mistry\r\nRyan McDonald\r\nMerrilyn Gann\r\nHenry O\r\nPatrick Gilmore\r\nDean Marshall\r\nRon Selmour\r\nViv Leacock\r\nChris Boyd\r\nDonna Yamamoto\r\nDoron Bell\r\nDavid Orth\r\nLyndall Grant\r\nJason Diablo\r\nTy Olsson\r\nZinaid Memisevic\r\nVincent Cheng\r\nIgor Morozov\r\nBJ Harrison\r\nDominic Zamprogna\r\nKarin Konoval\r\nMary Gillis\r\nRick Tae\r\nParm Soor\r\nGerard Plunkett\r\nPaul Tryl\r\nAndrei Kovski\r\nVal Cole\r\nEve Harlow\r\nSean Tyson\r\nLeonard Tenisci\r\nMichael Buffer\r\nDaren A. Herbert\r\nCraig Stanghetta\r\nMateen Devji\r\nQayam Devji\r\nJody Thompson\r\nTanya Champoux\r\nFrank C. Turner\r\nKinua McWatt\r\nLaara Sadiq\r\nGillian Barber\r\nCandus Churchill\r\nBeverley Elliott\r\nAgam Darshi\r\nRaj Lal\r\nPesi Daruwalla\r\nJacob Blair\r\nJay Williams\r\nScott E. Miller\r\nAnna Mae Wills\r\nJohn Stewart\r\nRyan Cook\r\nBrandon Haas\r\nEddie Hassell\r\nBetty Phillips\r\nGeorgina Hegedos\r\nLuis Javier\r\nDean Redman\r\nGordon Lai\r\nMark Docherty\r\nMark Oliver\r\nAndrew Moxham\r\nAlexandra Castillo\r\nFarouk A. Afify\r\nShaun Wilson\r\nLeo Li Chiang\r\nElizabeth Richard\r\nKyle Riefsnyder\r\nJohn Mee\r\nGeorge Trochta\r\nGeoff Gustafson\r\nAlex Zahara\r\nJason Griffith\r\nJill Morrison\r\nThomas Parkinson\r\nLeona Naidoo\r\nQuentin Guyon\r\nNicole Rudell\r\nChad Riley\r\nSimon Leung\r\nKevin Haaland\r\nLeigh Burrows\r\nCarolyn Adair\r\nPeter Arpesella\r\nChris Arreguin\r\nTj Austin\r\nSahar Biniaz\r\nAnthony Bonaventura\r\nChuck Daar\r\nTerence Dament\r\nLea Deesing\r\nNorman Deesing\r\nAbigail Delves\r\nPaula Elle\r\nEddie L. Fauria\r\nGladis Giada\r\nJacob Goodall\r\nAshley Hand\r\nAyana Haviv\r\nRobert Hayley\r\nWaléra Kanischtscheff\r\nRena Kawabata\r\nMarco Khan\r\nErik Kowalski\r\nJulie Krol\r\nJonathan Lane\r\nTom MacNeill\r\nRobert Malina\r\nWilliam Myers\r\nJessica Provencher\r\nLarry Purtell\r\nMichael Karl Richards\r\nDavid Richmond-Peck\r\nCharlie Robson\r\nJoshua Salvati\r\nDan Savoie\r\nRichard Schimmelpfenneg\r\nEric Shackelford\r\nPatricia Shih\r\nRobyn Jean Springer\r\nMichael Stevens\r\nDale Tarrant\r\nGary Thom\r\nIan Thompson\r\nDerek Versteeg\r\nYuel Yawney\r\nAkbar Zaman', 'We Were Warned.\r\n\r\nWho will be left behind?\r\n\r\nThe end is just the beginning.\r\n\r\nFirst, the Mayan calendar predicted it...Now, science has confirmed it...but we never imagined it could really happen.\r\n\r\nMankind''s earliest civilization warned us this day would come...\r\n\r\nFind out the truth. Search: 2012\r\n\r\nHow will you survive? Search: 2012\r\n\r\nHow would the governments of our planet prepare 6 billion people for the end of the world...? They wouldn''t.', 'A frustrated writer struggles to keep his family alive when a series of global catastrophes threatens to annihilate mankind.', 'Dr. Adrian Helmsley, part of a worldwide geophysical team investigating the effect on the earth of radiation from unprecedented solar storms, learns that the earth''s core is heating up. He warns U.S. President Thomas Wilson that the crust of the earth is becoming unstable and that without proper preparations for saving a fraction of the world''s population, the entire race is doomed. Meanwhile, writer Jackson Curtis stumbles on the same information. While the world''s leaders race to build "arks" to escape the impending cataclysm, Curtis struggles to find a way to save his family. Meanwhile, volcanic eruptions and earthquakes of unprecedented strength wreak havoc around the world.              \r\n                  - Written by\r\nJim Beaver\r\n\r\nGeophysicist Adrian Helmsley officially visits India''s Dr. Satnam Tsurutani, his pretty wife, Aparna, and their son. From thence, he is led to the world''s deepest copper mine, where he finds evidence that the Earth''s crust is heating up faster than expected. He quickly collects evidence, and presents it before the President of the United States. Expecting the news to hit leading media, he is instead stunned when he learns that the powers-that-be have no intention of publicizing this catastrophe, and are intent on saving wealthy families that can shell out a billion Euros per family on four mammoth arks - without realizing that if the Earth is indeed headed for the prophetic self-destruction on 21 December 2012 - how can arks and it''s wealthy inhabitants survive?              \r\n                  - Written by\r\nrAjOo (gunwanti@hotmail.com)\r\n\r\nSeveral years before, geologist Adrian Helmsley comes across information that shows the world will come to an end in 2012. No announcement is made but the G8 countries begin to prepare for the event. Jack Curtis is a divorced and a less than successful writer. While on a camping trip with his children in Yosemite, he meets Charlie Frost, who is preaching that the end of the world is at hand. A series of events leads Curtis to believe what Frost has told him and with his family, heads for China where the industrialized countries have been working on a response to the impending disaster.              \r\n                  - Written by\r\ngarykmcd\r\n\r\nWhen the geologist Dr. Adrian Helmsley and his team discover that the core of Earth is heating due to solar radiation, he advises the North American President about his findings. The American Govern collects money from the worldwide leaders to build arks to save them with necessary people to rebuild civilization. Meanwhile, the unsuccessful writer Jackson Curtis discloses that the world is near to end and tries to save his son and his daughter from the tragic end.              \r\n                  - Written by\r\nClaudio Carvalho, Rio de Janeiro, Brazil\r\n\r\nA frustrated writer struggles to keep his family alive when a series of global catastrophes threatens to annihilate mankind.        \r\n          - Written by\r\nrball4042', 'DVD', 1, 1, '', 0, '2015-02-05', '', '2015-02-05 12:30:10', '', '', '', ''),
(3, '1941433', '2012', '', 2011, 5, 5.3, 'English', 'USA', 'Short\r\nDrama', 'Rachel Han Xu', 'Rachel Han Xu', 'Stephen Gibler', 'Vincent Oppido', 'Craig Bruenell\r\nStephen Chang\r\nPeggy Clements\r\nTheresa Grasso\r\nMichael Iinuma\r\nAlice Ryan', 'Where would you go if tomorrow is the end of the world?', '', '', 'DVD', 1, 0, '', 0, '2015-02-05', '', '2015-02-05 12:34:44', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` smallint(6) NOT NULL,
  `login` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log_date` datetime NOT NULL,
  `ip` varchar(12) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `email`, `reg_date`, `log_date`, `ip`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '2015-02-09 18:55:57', '0000-00-00 00:00:00', ''),
(2, 'aaa', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'aaa@aa.pl', '2015-02-09 19:23:24', '0000-00-00 00:00:00', ''),
(3, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '2015-02-09 19:49:19', '0000-00-00 00:00:00', ''),
(4, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '2015-02-09 19:50:37', '0000-00-00 00:00:00', ''),
(5, 'bbb', '5cb138284d431abd6a053a56625ec088bfb88912', 'bbb@bbb.pl', '2015-02-09 19:52:31', '0000-00-00 00:00:00', ''),
(6, 'ccc', 'f36b4825e5db2cf7dd2d2593b3f5c24c0311d8b2', 'ccc@ccc.pl', '2015-02-09 20:03:42', '0000-00-00 00:00:00', ''),
(7, 'ddd', '9c969ddf454079e3d439973bbab63ea6233e4087', 'ddd@ddd.pl', '2015-02-09 20:05:55', '0000-00-00 00:00:00', ''),
(8, 'eee', '637a81ed8e8217bb01c15c67c39b43b0ab4e20f1', 'eee@eee.pl', '2015-02-09 20:08:34', '0000-00-00 00:00:00', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
 ADD PRIMARY KEY (`id`), ADD KEY `loaned` (`loaned`), ADD KEY `format` (`format`), ADD KEY `search` (`name`,`imdbid`,`year`,`rating`,`format`,`own`,`seen`,`loaned`,`added`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `movies`
--
ALTER TABLE `movies`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
MODIFY `id_user` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
