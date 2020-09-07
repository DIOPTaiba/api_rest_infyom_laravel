-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 07 sep. 2020 à 07:56
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `api_infyom_laravel`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `id_responsable_compte` int(11) DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_inscription` datetime NOT NULL,
  `type_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `id_responsable_compte`, `adresse`, `telephone`, `email`, `date_inscription`, `type_client`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Taiba Ndiaye', '773511003', 'mordioptaiba@gmail.com', '2020-09-06 21:10:25', 'Non Salarié', '2020-09-06 21:10:44', '2020-09-06 21:10:44', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `client_moral`
--

CREATE TABLE `client_moral` (
  `id` int(11) NOT NULL,
  `id_clients` int(11) DEFAULT NULL,
  `nom_entreprise` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identifiant_entreprise` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `raison_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client_non_salarie`
--

CREATE TABLE `client_non_salarie` (
  `id` int(11) NOT NULL,
  `id_clients` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carte_identite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `client_non_salarie`
--

INSERT INTO `client_non_salarie` (`id`, `id_clients`, `nom`, `prenom`, `carte_identite`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'DIOP', 'Mor', '100', '2020-09-06 21:11:49', '2020-09-06 21:11:49', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `client_salarie`
--

CREATE TABLE `client_salarie` (
  `id` int(11) NOT NULL,
  `id_clients` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carte_identite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salaire` decimal(10,0) NOT NULL,
  `nom_employeur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_entreprise` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `raison_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identifiant_entreprise` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id` int(11) NOT NULL,
  `id_clients` int(11) DEFAULT NULL,
  `numero_compte` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cle_rib` int(11) NOT NULL,
  `solde` decimal(10,0) NOT NULL,
  `date_ouverture` datetime NOT NULL,
  `numero_agence` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`id`, `id_clients`, `numero_compte`, `cle_rib`, `solde`, `date_ouverture`, `numero_agence`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'nc100', 11, '300000', '2020-09-06 21:12:16', 1, '2020-09-06 21:12:22', '2020-09-06 21:12:22', NULL),
(2, 1, 'nc200', 12, '100000', '2020-09-07 05:46:48', 1, '2020-09-07 05:46:55', '2020-09-07 05:46:55', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comptes_etats`
--

CREATE TABLE `comptes_etats` (
  `comptes_id` int(11) NOT NULL,
  `etatcompte_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compte_bloque`
--

CREATE TABLE `compte_bloque` (
  `id` int(11) NOT NULL,
  `id_comptes` int(11) DEFAULT NULL,
  `frais_ouverture` decimal(10,0) NOT NULL,
  `montant_remuneration` decimal(10,0) NOT NULL,
  `duree_blocage` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compte_courant`
--

CREATE TABLE `compte_courant` (
  `id` int(11) NOT NULL,
  `id_comptes` int(11) DEFAULT NULL,
  `agios` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compte_epargne`
--

CREATE TABLE `compte_epargne` (
  `id` int(11) NOT NULL,
  `id_comptes` int(11) DEFAULT NULL,
  `frais_ouverture` decimal(10,0) NOT NULL,
  `montant_remuneration` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etat_compte`
--

CREATE TABLE `etat_compte` (
  `id` int(11) NOT NULL,
  `etat_compte` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_changement_etat` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `etat_compte`
--

INSERT INTO `etat_compte` (`id`, `etat_compte`, `date_changement_etat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Actif', '2020-09-07 05:43:13', '2020-09-07 05:43:19', '2020-09-07 05:43:19', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `operations`
--

CREATE TABLE `operations` (
  `id` int(11) NOT NULL,
  `type_operation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `montant` int(11) NOT NULL,
  `date_operation` datetime NOT NULL,
  `id_compte_source_id` int(11) NOT NULL,
  `id_compte_destinataire_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `operations`
--

INSERT INTO `operations` (`id`, `type_operation`, `montant`, `date_operation`, `id_compte_source_id`, `id_compte_destinataire_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dépôt', 50000, '2020-09-07 05:47:23', 1, NULL, '2020-09-07 05:47:43', '2020-09-07 05:47:43', NULL),
(2, 'Retrait', 100000, '2020-09-07 05:48:47', 2, NULL, '2020-09-07 05:49:02', '2020-09-07 05:49:02', NULL),
(3, 'Virement', 150000, '2020-09-07 05:49:29', 1, 2, '2020-09-07 05:49:37', '2020-09-07 05:49:37', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `responsable_compte`
--

CREATE TABLE `responsable_compte` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_employes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `responsable_compte`
--

INSERT INTO `responsable_compte` (`id`, `login`, `mot_de_passe`, `id_employes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'res', 'passer', 1, '2020-09-06 15:49:01', '2020-09-06 15:50:36', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'momo DIOP', 'momo@gmail.com', NULL, '$2y$10$6PtBuMyva2GLRiTwdDwiHei9DPxHjNnF4tzjcYxLjzmP5tmMTCUam', NULL, '2020-09-06 15:38:25', '2020-09-06 15:38:25');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C82E74EF09719E` (`id_responsable_compte`);

--
-- Index pour la table `client_moral`
--
ALTER TABLE `client_moral`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_83FF4A8DE558704` (`id_clients`);

--
-- Index pour la table `client_non_salarie`
--
ALTER TABLE `client_non_salarie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4FC7282CDE558704` (`id_clients`);

--
-- Index pour la table `client_salarie`
--
ALTER TABLE `client_salarie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D0B37E67DE558704` (`id_clients`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_56735801DE558704` (`id_clients`);

--
-- Index pour la table `comptes_etats`
--
ALTER TABLE `comptes_etats`
  ADD PRIMARY KEY (`comptes_id`,`etatcompte_id`),
  ADD KEY `IDX_E05BE3CBDCED588B` (`comptes_id`),
  ADD KEY `IDX_E05BE3CB41D08BD0` (`etatcompte_id`);

--
-- Index pour la table `compte_bloque`
--
ALTER TABLE `compte_bloque`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2B4331DF88EEF171` (`id_comptes`);

--
-- Index pour la table `compte_courant`
--
ALTER TABLE `compte_courant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_73F05D6C88EEF171` (`id_comptes`);

--
-- Index pour la table `compte_epargne`
--
ALTER TABLE `compte_epargne`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_19FDB51A88EEF171` (`id_comptes`);

--
-- Index pour la table `etat_compte`
--
ALTER TABLE `etat_compte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_28145348B5387782` (`id_compte_source_id`),
  ADD KEY `IDX_281453486DE5B1A9` (`id_compte_destinataire_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `responsable_compte`
--
ALTER TABLE `responsable_compte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `client_moral`
--
ALTER TABLE `client_moral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client_non_salarie`
--
ALTER TABLE `client_non_salarie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `client_salarie`
--
ALTER TABLE `client_salarie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `compte_bloque`
--
ALTER TABLE `compte_bloque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compte_courant`
--
ALTER TABLE `compte_courant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compte_epargne`
--
ALTER TABLE `compte_epargne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etat_compte`
--
ALTER TABLE `etat_compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `responsable_compte`
--
ALTER TABLE `responsable_compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `FK_C82E74EF09719E` FOREIGN KEY (`id_responsable_compte`) REFERENCES `responsable_compte` (`id`);

--
-- Contraintes pour la table `client_moral`
--
ALTER TABLE `client_moral`
  ADD CONSTRAINT `FK_83FF4A8DE558704` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `client_non_salarie`
--
ALTER TABLE `client_non_salarie`
  ADD CONSTRAINT `FK_4FC7282CDE558704` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `client_salarie`
--
ALTER TABLE `client_salarie`
  ADD CONSTRAINT `FK_D0B37E67DE558704` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD CONSTRAINT `FK_56735801DE558704` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `comptes_etats`
--
ALTER TABLE `comptes_etats`
  ADD CONSTRAINT `FK_E05BE3CB41D08BD0` FOREIGN KEY (`etatcompte_id`) REFERENCES `etat_compte` (`id`),
  ADD CONSTRAINT `FK_E05BE3CBDCED588B` FOREIGN KEY (`comptes_id`) REFERENCES `comptes` (`id`);

--
-- Contraintes pour la table `compte_bloque`
--
ALTER TABLE `compte_bloque`
  ADD CONSTRAINT `FK_2B4331DF88EEF171` FOREIGN KEY (`id_comptes`) REFERENCES `comptes` (`id`);

--
-- Contraintes pour la table `compte_courant`
--
ALTER TABLE `compte_courant`
  ADD CONSTRAINT `FK_73F05D6C88EEF171` FOREIGN KEY (`id_comptes`) REFERENCES `comptes` (`id`);

--
-- Contraintes pour la table `compte_epargne`
--
ALTER TABLE `compte_epargne`
  ADD CONSTRAINT `FK_19FDB51A88EEF171` FOREIGN KEY (`id_comptes`) REFERENCES `comptes` (`id`);

--
-- Contraintes pour la table `operations`
--
ALTER TABLE `operations`
  ADD CONSTRAINT `FK_281453486DE5B1A9` FOREIGN KEY (`id_compte_destinataire_id`) REFERENCES `comptes` (`id`),
  ADD CONSTRAINT `FK_28145348B5387782` FOREIGN KEY (`id_compte_source_id`) REFERENCES `comptes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
