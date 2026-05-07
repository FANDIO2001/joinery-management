3.2.1 Table users
Colonne Type Contrainte Description
id BIGINT UNSIGNED PK, AUTO_INC Identifiant unique
name VARCHAR(100) NOT NULL Nom complet
email VARCHAR(150) UNIQUE, NOT NULL Adresse email
phone VARCHAR(20) NULLABLE Numéro de téléphone
password VARCHAR(255) NOT NULL Hash bcrypt
user_type ENUM NOT NULL admin|manager|artisan|livreur|client
avatar VARCHAR(255) NULLABLE Chemin vers la photo
is_active BOOLEAN DEFAULT TRUE Compte actif/bloqué
two_factor_secret TEXT NULLABLE Secret TOTP pour 2FA
email_verified_at TIMESTAMP NULLABLE Date vérification email
remember_token VARCHAR(100) NULLABLE Token remember me
created_at TIMESTAMP NOT NULL Date de création
updated_at TIMESTAMP NOT NULL Date de mise à jour

3.2.2 Table products
Colonne Type Contrainte Description
id BIGINT UNSIGNED PK, AUTO_INC Identifiant unique
category_id BIGINT UNSIGNED FK categories Catégorie parente
name VARCHAR(200) NOT NULL Nom du meuble
slug VARCHAR(220) UNIQUE URL SEO-friendly
description TEXT NULLABLE Description longue
short_description VARCHAR(500) NULLABLE Description courte
base_price DECIMAL(12,2) NOT NULL Prix de base FCFA
cost_price DECIMAL(12,2) NULLABLE Prix de revient (interne)
sku VARCHAR(50) UNIQUE Code article
status ENUM NOT NULL draft|active|archived
is_customizable BOOLEAN DEFAULT FALSE Autoriser personnalisation
min_fabrication_days SMALLINT DEFAULT 7 Délai minimum (jours)
weight_kg DECIMAL(6,2) NULLABLE Poids pour livraison
dimensions JSON NULLABLE L×l×H en cm
meta_title VARCHAR(160) NULLABLE SEO title
meta_description VARCHAR(320) NULLABLE SEO description
views_count INT DEFAULT 0 Compteur de vues
created_at TIMESTAMP NOT NULL Date création

3.2.3 Table orders
Colonne Type Contrainte Description
id BIGINT UNSIGNED PK, AUTO_INC Identifiant unique
reference VARCHAR(20) UNIQUE Ex: CMD-2025-00123
client_id BIGINT UNSIGNED FK users Client propriétaire
address_id BIGINT UNSIGNED FK client_addresses Adresse de livraison
status ENUM NOT NULL pending|confirmed|in_production|ready|delivering|delivered|cancelled
subtotal DECIMAL(12,2) NOT NULL Sous-total HT
discount_amount DECIMAL(12,2) DEFAULT 0 Remise accordée
delivery_fee DECIMAL(12,2) DEFAULT 0 Frais de livraison
tax_amount DECIMAL(12,2) DEFAULT 0 Montant TVA
total_amount DECIMAL(12,2) NOT NULL Total TTC
paid_amount DECIMAL(12,2) DEFAULT 0 Montant déjà payé
payment_status ENUM NOT NULL unpaid|partial|paid|refunded
delivery_type ENUM NOT NULL delivery|pickup
notes TEXT NULLABLE Instructions spéciales
confirmed_at TIMESTAMP NULLABLE Date de confirmation
delivered_at TIMESTAMP NULLABLE Date de livraison
cancelled_at TIMESTAMP NULLABLE Date d'annulation
cancel_reason TEXT NULLABLE Motif d'annulation
created_by BIGINT UNSIGNED FK users Créé par (client ou agent)
created_at TIMESTAMP NOT NULL Date création

3.2.4 Table work_orders (ordres de fabrication)
Colonne Type Contrainte Description
id BIGINT UNSIGNED PK
order_item_id BIGINT UNSIGNED FK order_items Article de commande associé
assigned_to BIGINT UNSIGNED FK users (AR) Artisan responsable
priority ENUM NOT NULL low|normal|high|urgent
status ENUM NOT NULL pending|in_progress|paused|done|rejected
started_at TIMESTAMP NULLABLE Début effectif
completed_at TIMESTAMP NULLABLE Fin effective
estimated_hours DECIMAL(5,2) NULLABLE Durée estimée
actual_hours DECIMAL(5,2) NULLABLE Durée réelle
notes TEXT NULLABLE Notes de fabrication
quality_checked_by BIGINT UNSIGNED FK users Contrôleur qualité
quality_checked_at TIMESTAMP NULLABLE Date contrôle qualité

3.2.5 Table employees (RH)
Colonne Type Contrainte Description
id BIGINT UNSIGNED PK
user_id BIGINT UNSIGNED FK users, UNIQUE Compte utilisateur lié
employee_code VARCHAR(20) UNIQUE Code employé interne
job_title VARCHAR(100) NOT NULL Poste occupé
department VARCHAR(100) NOT NULL Service / atelier
hire_date DATE NOT NULL Date d'embauche
contract_type ENUM NOT NULL cdi|cdd|stage|freelance
base_salary DECIMAL(12,2) NOT NULL Salaire de base mensuel
bank_account VARCHAR(100) ENCRYPTED Coordonnées bancaires
emergency_contact JSON NULLABLE Contact urgence
skills JSON NULLABLE Liste des compétences
is_active BOOLEAN DEFAULT TRUE Actif/Inactif

3.2.6 Table materials (stocks)
Colonne Type Contrainte Description
id BIGINT UNSIGNED PK
supplier_id BIGINT UNSIGNED FK suppliers Fournisseur principal
name VARCHAR(150) NOT NULL Nom de la matière
reference VARCHAR(50) UNIQUE Référence interne
unit ENUM NOT NULL m|m²|m³|kg|litre|pièce
unit_cost DECIMAL(12,2) NOT NULL Coût unitaire
current_stock DECIMAL(10,3) DEFAULT 0 Stock actuel
minimum_stock DECIMAL(10,3) NOT NULL Seuil d'alerte
reorder_quantity DECIMAL(10,3) NOT NULL Quantité à commander
location VARCHAR(100) NULLABLE Emplacement en entrepôt
type ENUM NOT NULL wood|hardware|finish|consumable|other

3.3 Relations entre entités
Entité source Relation Entité cible
users 1 — N orders (client)
users 1 — 1 employees
categories 1 — N products
products 1 — N product_variants
products 1 — N product_images
orders 1 — N order_items
orders 1 — N order_status_history
orders 1 — 1 invoices
orders 1 — N payments
order_items 1 — 1 work_orders
work_orders 1 — N work_order_steps
work_orders N — N materials (via work_order_materials)
employees 1 — N attendances
employees 1 — N leaves
employees 1 — N payrolls
materials 1 — N stock_movements
suppliers 1 — N purchase_orders
orders 1 — N deliveries
deliveries 1 — N delivery_items
users 1 — N tickets (SAV)
users 1 — N notifications

  4. Description des modules fonctionnels
Module M1 – Catalogue & Exposition
4.1.1 Description
La vitrine publique est accessible sans authentification. Elle présente l'ensemble des meubles proposés par la menuiserie, avec les fonctionnalités de découverte, de recherche et de configuration de produits.
4.1.2 Fonctionnalités détaillées
• Gestion des catégories avec hiérarchie (catégories / sous-catégories) et images
• Fiches produits complètes : galerie photos HD, vidéo de présentation, dimensions (L×l×H), poids, matériaux, délai de fabrication, prix de base
• Configurateur de produits sur-mesure : choix des dimensions personnalisées, finitions (vernis, laque, teinte), type de bois, accessoires et quincaillerie
• Calcul de prix dynamique en fonction de la configuration choisie
• Système de filtres avancés : catégorie, fourchette de prix, matériau, délai, disponibilité, style (moderne, classique, africain...)
• Recherche full-text (Laravel Scout + MeiliSearch) avec suggestions et correction orthographique
• Avis et notes clients (1–5 étoiles) avec modération par le gestionnaire
• Galerie de réalisations : photos de chantiers livrés avec accord client
• Produits similaires / recommandations basées sur l'historique
• Gestion SEO : méta-titre, méta-description, slug, sitemap.xml, robots.txt
• Compteur de vues par produit (analytics internes)
ℹ Les prix affichés incluent une indication du délai minimum de fabrication. La disponibilité immédiate n'est proposée que pour les modèles en stock d'exposition.
Module M2 – Panier & Commandes
4.2.1 Gestion du panier
• Panier persistant (base de données) pour les clients connectés, cookie pour les visiteurs avec fusion à la connexion
• Ajout de produits standards ou configurés (dimensions + finitions sauvegardées dans le cart_item)
• Modification des quantités, suppression, vidage du panier
• Application de codes promotionnels avec règles : pourcentage, montant fixe, livraison offerte, date de validité, usage unique
• Calcul dynamique : sous-total, remise, frais de livraison selon zone, taxe, total TTC
• Estimation du délai de livraison basée sur la somme des délais de fabrication des articles
4.2.2 Processus de commande
Le cycle de vie d'une commande suit les étapes suivantes :
Statut Déclencheur Actions automatiques
pending Client valide le panier Création commande, envoi confirmation email/SMS, génération devis PDF
confirmed Gestionnaire confirme Notification client, création orders de fabrication pour chaque article
in_production Premier ordre lancé en atelier Email client : fabrication démarrée, barre de progression activée
quality_check Dernier OF terminé Notification gestionnaire pour contrôle qualité
ready Gestionnaire valide qualité SMS client : commande prête, planification livraison
delivering Livreur démarre tournée Lien de tracking envoyé au client
delivered Livreur confirme livraison Facture finale générée, demande d'avis envoyée
cancelled Client ou gestionnaire Email annulation, remboursement déclenché si paiement effectué

4.2.3 Suivi client
• Page de suivi accessible depuis l'espace client avec timeline visuelle des statuts
• Barre de progression par article (% de fabrication basé sur les étapes OF terminées)
• Messagerie intégrée à la commande : échange client ↔ gestionnaire
• Historique de tous les statuts avec horodatage et acteur
• Modification de commande autorisée uniquement au statut pending (avant confirmation)
• Annulation possible jusqu'au statut in_production avec règles de remboursement paramétrables
Module M3 – CRM Clients
• Profil client enrichi : informations personnelles, multiples adresses de livraison, préférences de style, langue
• Historique complet : toutes les commandes, devis, factures, tickets SAV accessibles en un clic
• Segmentation automatique : Nouveau, Régulier, VIP (basé sur montant cumulé et fréquence d'achat)
• Gestion des clients professionnels (B2B) : numéro contribuable, conditions de paiement différées, plafond de crédit, tarifs négociés
• Programme de fidélité : points attribués à chaque commande, paliers de récompenses (remises, livraison gratuite)
• Statistiques par client : panier moyen, nombre de commandes, produits préférés
• Blacklist : possibilité de bloquer un client avec motif journalisé
• Export CSV / Excel de la base clients (RGPD compliant)
• Consentement RGPD tracé : accord pour communications marketing
⚑ Les données personnelles des clients doivent être traitées conformément au droit applicable. Un mécanisme de suppression de compte (droit à l'oubli) doit être implémenté.
Module M4 – Production & Atelier
4.4.1 Ordres de fabrication (OF)
• Génération automatique d'un OF par article de commande à la confirmation de la commande
• Fiche technique de l'OF : désignation, dimensions, finitions, matériaux requis (liste de coupe), artisan assigné, délai
• Déduction automatique du stock matières à la création de l'OF (stock réservé)
• Assignation manuelle ou automatique à un artisan selon ses compétences et sa charge de travail
4.4.2 Étapes de fabrication
Étape Code Responsable Déclencheur suivant
Préparation matières PREP Magasinier Validation sortie stock
Découpe CUT Artisan OF mise en coupe terminée
Assemblage ASSEM Artisan Toutes pièces assemblées
Ponçage SAND Artisan Surface nivelée
Finition / Peinture FINISH Artisan Séchage validé
Contrôle qualité QC Responsable QC Validation ou rejet
Emballage PACK Préparateur Prêt pour livraison

4.4.3 Planning d'atelier
• Vue Gantt : charge de travail par artisan sur 4 semaines glissantes
• Vue Kanban : colonnes par statut d'OF (À faire, En cours, Contrôle, Terminé)
• Indicateurs de capacité : nombre d'heures allouées vs disponibles par artisan
• Alertes : OF en retard, artisan surchargé, rupture de stock matière
• Gammes opératoires : templates de fabrication par modèle de meuble (étapes, temps standards)
• Rapport rendement : temps réel vs estimé par OF et par artisan
Module M5 – Personnel & Ressources Humaines
• Fiches employés complètes : état civil, contrat, poste, compétences, photo
• Pointage et présences : entrée/sortie manuelle ou QR code, calcul heures normales et supplémentaires
• Gestion des congés : demande en ligne → validation manager → déduction solde → notification
• Types de congés : annuel, maladie, maternité/paternité, sans solde, récupération
• Calcul de la paie mensuelle : salaire de base + heures sup + primes - retenues (CNPS, impôts) + indemnités
• Bulletin de paie PDF généré automatiquement en fin de mois
• Gestion des avancements et augmentations avec historique
• Évaluations de performance semestrielles avec grilles de notation
• Tableau des effectifs : organigramme interactif, répartition par département
• Gestion des formations : suivi des certifications et compétences acquises
⚑ Le module RH est accessible exclusivement aux profils SA et MG. Les employés ont un accès limité à leur propre fiche (congés, bulletins de paie).
Module M6 – Devis & Facturation
4.6.1 Devis
• Génération automatique lors de la création d'une commande (devis pro forma)
• Devis manuel créé par le gestionnaire pour des projets sur-mesure hors catalogue
• Contenu du devis : en-tête entreprise, coordonnées client, tableau des articles avec descriptions techniques, délais, conditions de paiement
• Durée de validité paramétrable (défaut : 30 jours)
• Signature électronique du devis par le client (acceptation en ligne)
• Conversion automatique en bon de commande à l'acceptation
4.6.2 Facturation
• Cycle documentaire : Devis → Bon de commande → Facture pro forma → Facture définitive
• Numérotation séquentielle automatique : DEV-2025-XXXX, FAC-2025-XXXX
• Gestion des acomptes : demande d'acompte paramétrable (%, montant fixe), reçu de paiement automatique
• Facture de solde générée automatiquement à la livraison
• Avoir / note de crédit pour remboursements partiels ou annulations
• Export PDF avec logo, mentions légales, conditions générales de vente
4.6.3 Paiements
• Modes de paiement acceptés : espèces, virement bancaire, Mobile Money (Orange Money, MTN MoMo), chèque
• Réconciliation automatique des paiements Mobile Money via webhook API
• Tableau de bord des créances : factures impayées, partiellement payées, en retard (avec alertes)
• Relances automatiques par email/SMS aux J+7, J+14, J+30 après échéance
Module M7 – Stock & Approvisionnement
• Catalogue des matières premières : bois (essence, section, longueur), quincaillerie, produits de finition, emballages
• Mouvements de stock : entrée (réception fournisseur), sortie (OF lancé), ajustement (inventaire), transfert
• Traçabilité complète : chaque mouvement lié à son OF ou bon de commande fournisseur
• Alertes automatiques de réapprovisionnement quand le stock descend sous le seuil minimum
• Génération automatique de bons de commande fournisseur avec quantité calculée (min de réapprovisionnement)
• Gestion des fournisseurs : fiche, catalogue produits, historique de prix, délais de livraison, évaluation
• Réception de commande fournisseur : vérification quantités, signalement d'écarts, mise à jour stock
• Valorisation du stock : méthode CMUP (Coût Moyen Unitaire Pondéré)
• Inventaire périodique : liste de comptage, écarts constatés, régularisation
• Rapport de consommation matière par OF : consommation théorique vs réelle, taux de perte
Module M8 – Livraison & Service Après-Vente
4.8.1 Livraison
• Planification des tournées : affectation des livraisons à un livreur, optimisation de l'ordre de passage
• Feuille de route PDF pour le livreur avec adresses et contacts
• Application mobile livreur (PWA) : liste des livraisons du jour, navigation GPS, confirmation de livraison
• Confirmation de livraison : signature électronique du client, photo horodatée
• Partage du lien de tracking temps réel avec le client (position du livreur sur carte)
• Gestion des tentatives de livraison infructueuses : reprogrammation automatique
4.8.2 Service Après-Vente
• Création de tickets SAV par le client ou le gestionnaire avec catégorie : défaut fabrication, livraison endommagée, réclamation, demande d'entretien
• Workflow de traitement : Ouvert → En cours → En attente → Résolu → Fermé
• SLA par catégorie : temps de première réponse et de résolution maximum
• Gestion des retours : bon de retour généré, réintégration stock ou mise en rebut
• Garanties par produit : durée, pièces couvertes, conditions d'exclusion
• Base de connaissances interne : problèmes fréquents et solutions documentées
• Évaluation de la résolution par le client (satisfaction SAV)
Module M9 – Notifications & Communication
4.9.1 Notifications système
Événement Email SMS In-app
Commande créée ✓ ✓ ✓
Commande confirmée ✓ ✓ ✓
Fabrication démarrée ✓ – ✓
Commande prête ✓ ✓ ✓
Livraison en route – ✓ ✓
Livraison effectuée ✓ ✓ ✓
Facture générée ✓ – ✓
Paiement reçu ✓ ✓ ✓
Ticket SAV ouvert ✓ – ✓
Ticket SAV résolu ✓ ✓ ✓
Devis expirant (J-3) ✓ – ✓
Stock sous seuil (interne) ✓ – ✓

4.9.2 Communication
• Messagerie interne par commande : historique des échanges client ↔ gestionnaire, pièces jointes
• Templates d'emails paramétrables via interface d'administration (WYSIWYG)
• Campagnes marketing : ciblage par segment client, planification, suivi taux d'ouverture
• Newsletter : inscription/désinscription, gestion des listes
• Centre de notifications in-app : badge compteur, marquage lu/non-lu, archivage
Module M10 – Tableau de bord & Analytics
4.10.1 KPIs par profil
Profil Indicateurs affichés
Gestionnaire CA du jour/mois/année, nb commandes, panier moyen, taux de conversion, marge brute, créances en cours
Atelier OF en cours, OF en retard, charge par artisan, taux de rendement, consommation matière du mois
RH Présents aujourd'hui, absences, soldes congés, masse salariale du mois
Direction Toutes métriques + évolution N vs N-1, top produits, top clients, prévisions

4.10.2 Rapports
• Rapport des ventes : par période, par catégorie, par produit, par client, par commercial
• Rapport de production : OF traités, délais respectés, taux de rejet qualité, productivité par artisan
• Rapport stocks : valorisation, mouvements, ruptures, surconsommations
• Rapport RH : heures travaillées, absences, masse salariale, coût main-d'oeuvre
• Rapport financier : recettes, charges, marges, factures impayées
• Tous les rapports exportables en Excel et PDF
• Planification de rapports automatiques : envoi par email à fréquence paramétrable
Module M11 – Sécurité, Rôles & Audit
4.11.1 Gestion des permissions
Les permissions sont définies à granularité fine selon le principe du moindre privilège :
Permission SA MG AR LV CL
Voir catalogue ✓ ✓ ✓ ✓ ✓
Passer commande ✓ ✓ – – ✓
Valider commande ✓ ✓ – – –
Gérer catalogue produits ✓ ✓ – – –
Gérer OF atelier ✓ ✓ ✓ – –
Gérer employés ✓ ✓ – – –
Accéder facturation ✓ ✓ – – Ses factures
Gérer stock ✓ ✓ ✓ – –
Effectuer livraisons ✓ ✓ – ✓ –
Voir analytics ✓ ✓ – – –
Gérer rôles ✓ – – – –
Voir journal audit ✓ ✓ – – –

4.11.2 Journal d'audit
• Traçabilité automatique via spatie/laravel-activitylog sur tous les modèles critiques
• Informations enregistrées : utilisateur, action (create/update/delete/login), modèle affecté, valeurs avant/après, IP, user-agent, horodatage
• Interface de consultation avec filtres (utilisateur, date, action, modèle)
• Alertes sur actions sensibles : suppression de produit, modification de prix, annulation de commande, connexion depuis IP inconnue
• Rétention des logs : 24 mois minimum, archivage compressé au-delà
