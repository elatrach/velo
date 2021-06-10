<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210610112026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accessoire (id_accessoire INT AUTO_INCREMENT NOT NULL, libelle_accessoire VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id_accessoire)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annonce (id_annonce INT AUTO_INCREMENT NOT NULL, id_categorie INT DEFAULT NULL, id_cible INT DEFAULT NULL, id_taille INT DEFAULT NULL, id_utilisateur INT DEFAULT NULL, titre_annonce VARCHAR(45) DEFAULT NULL, description_annonce VARCHAR(255) DEFAULT NULL, prix_annonce VARCHAR(45) DEFAULT NULL, date_creation_annonce DATETIME DEFAULT NULL, flag_affiche_annonce TINYINT(1) DEFAULT NULL, INDEX fk_annonce_public1_idx (id_cible), INDEX fk_annonce_categorie1_idx (id_categorie), INDEX fk_annonce_taille1_idx (id_taille), INDEX fk_annonce_utilisateur2_idx (id_utilisateur), PRIMARY KEY(id_annonce)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annonce_accessoire (id_annonce INT NOT NULL, id_accessoire INT NOT NULL, INDEX IDX_1689D7E928C83A95 (id_annonce), INDEX IDX_1689D7E9AD7782BD (id_accessoire), PRIMARY KEY(id_annonce, id_accessoire)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id_categorie INT AUTO_INCREMENT NOT NULL, libelle_categorie VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id_categorie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cible (id_cible INT AUTO_INCREMENT NOT NULL, libelle_cible VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id_cible)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moyen_paiement (id_moyen_paiement INT AUTO_INCREMENT NOT NULL, libelle_moyen_paiement VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id_moyen_paiement)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id_panier INT AUTO_INCREMENT NOT NULL, id_reservation INT DEFAULT NULL, date DATETIME DEFAULT NULL, INDEX fk_panier_reservation2_idx (id_reservation), PRIMARY KEY(id_panier)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id_photo INT AUTO_INCREMENT NOT NULL, filename_photo VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id_photo)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_has_annonce (id_photo INT NOT NULL, id_annonce INT NOT NULL, INDEX IDX_9F3317E2FA32C528 (id_photo), INDEX IDX_9F3317E228C83A95 (id_annonce), PRIMARY KEY(id_photo, id_annonce)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reglement (id_reglement INT AUTO_INCREMENT NOT NULL, id_moyen_paiement INT DEFAULT NULL, id_reservation INT DEFAULT NULL, date_reglement DATETIME DEFAULT NULL, prix_reglement DOUBLE PRECISION DEFAULT NULL, versement_proprietaire DOUBLE PRECISION DEFAULT NULL, commission_reglement DOUBLE PRECISION DEFAULT NULL, INDEX fk_reglement_moyen_paiement1_idx (id_moyen_paiement), INDEX fk_reglement_reservation1_idx (id_reservation), PRIMARY KEY(id_reglement)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id_reservation INT AUTO_INCREMENT NOT NULL, id_annonce INT DEFAULT NULL, id_utilisateur INT DEFAULT NULL, date_debut_reservation DATETIME DEFAULT NULL, date_fin_reservation DATETIME DEFAULT NULL, statut_reservation VARCHAR(2) DEFAULT NULL COMMENT \'OK=reservation confirmé
        KO=reservation annulé
        EC=en cours\', INDEX fk_reservation_annonce2_idx (id_annonce), INDEX fk_reservation_utilisateur1_idx (id_utilisateur), PRIMARY KEY(id_reservation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taille (id_taille INT AUTO_INCREMENT NOT NULL, libelle_taille VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id_taille)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id_utilisateur INT AUTO_INCREMENT NOT NULL, nom_utilisateur VARCHAR(45) DEFAULT NULL, prenom_utilisateur VARCHAR(45) DEFAULT NULL, date_de_naissance_utilisateur DATETIME DEFAULT NULL, adresse_utilisateur VARCHAR(45) DEFAULT NULL, mail_utilisateur VARCHAR(45) DEFAULT NULL, mdp_utilisateur VARCHAR(255) DEFAULT NULL, portable_utilisateur VARCHAR(45) DEFAULT NULL, type_utilisateur VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id_utilisateur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5C9486A13 FOREIGN KEY (id_categorie) REFERENCES categorie (id_categorie)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5FD8AD0B FOREIGN KEY (id_cible) REFERENCES cible (id_cible)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E550673ED5 FOREIGN KEY (id_taille) REFERENCES taille (id_taille)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E550EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('ALTER TABLE annonce_accessoire ADD CONSTRAINT FK_1689D7E928C83A95 FOREIGN KEY (id_annonce) REFERENCES annonce (id_annonce)');
        $this->addSql('ALTER TABLE annonce_accessoire ADD CONSTRAINT FK_1689D7E9AD7782BD FOREIGN KEY (id_accessoire) REFERENCES accessoire (id_accessoire)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF25ADA84A2 FOREIGN KEY (id_reservation) REFERENCES reservation (id_reservation)');
        $this->addSql('ALTER TABLE photo_has_annonce ADD CONSTRAINT FK_9F3317E2FA32C528 FOREIGN KEY (id_photo) REFERENCES photo (id_photo)');
        $this->addSql('ALTER TABLE photo_has_annonce ADD CONSTRAINT FK_9F3317E228C83A95 FOREIGN KEY (id_annonce) REFERENCES annonce (id_annonce)');
        $this->addSql('ALTER TABLE reglement ADD CONSTRAINT FK_EBE4C14CD022AAD4 FOREIGN KEY (id_moyen_paiement) REFERENCES moyen_paiement (id_moyen_paiement)');
        $this->addSql('ALTER TABLE reglement ADD CONSTRAINT FK_EBE4C14C5ADA84A2 FOREIGN KEY (id_reservation) REFERENCES reservation (id_reservation)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495528C83A95 FOREIGN KEY (id_annonce) REFERENCES annonce (id_annonce)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495550EAE44 FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur)');
        $this->addSql('DROP TABLE annonce_has_indisponibilite');
        $this->addSql('DROP TABLE calendrier_indisponibilite');
        $this->addSql('DROP TABLE calendrier_reservation');
        $this->addSql('DROP TABLE reservation_has_cal_reservation');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce_accessoire DROP FOREIGN KEY FK_1689D7E9AD7782BD');
        $this->addSql('ALTER TABLE annonce_accessoire DROP FOREIGN KEY FK_1689D7E928C83A95');
        $this->addSql('ALTER TABLE photo_has_annonce DROP FOREIGN KEY FK_9F3317E228C83A95');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495528C83A95');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5C9486A13');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5FD8AD0B');
        $this->addSql('ALTER TABLE reglement DROP FOREIGN KEY FK_EBE4C14CD022AAD4');
        $this->addSql('ALTER TABLE photo_has_annonce DROP FOREIGN KEY FK_9F3317E2FA32C528');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF25ADA84A2');
        $this->addSql('ALTER TABLE reglement DROP FOREIGN KEY FK_EBE4C14C5ADA84A2');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E550673ED5');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E550EAE44');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495550EAE44');
        $this->addSql('CREATE TABLE annonce_has_indisponibilite (id_annonce INT NOT NULL, id_indisponible INT NOT NULL, INDEX IDX_A13BD96728C83A95 (id_annonce), INDEX IDX_A13BD9672F7BEF0F (id_indisponible), PRIMARY KEY(id_annonce, id_indisponible)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE calendrier_indisponibilite (id_indisponible INT AUTO_INCREMENT NOT NULL, date_indisponibilte DATETIME DEFAULT NULL, PRIMARY KEY(id_indisponible)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE calendrier_reservation (id_calendrier_reservation INT AUTO_INCREMENT NOT NULL, date_reservation DATETIME DEFAULT NULL, PRIMARY KEY(id_calendrier_reservation)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reservation_has_cal_reservation (id_calendrier_reservation INT NOT NULL, id_reservation INT NOT NULL, INDEX IDX_EB175B9DA1615055 (id_calendrier_reservation), INDEX IDX_EB175B9D5ADA84A2 (id_reservation), PRIMARY KEY(id_calendrier_reservation, id_reservation)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE accessoire');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE annonce_accessoire');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE cible');
        $this->addSql('DROP TABLE moyen_paiement');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE photo_has_annonce');
        $this->addSql('DROP TABLE reglement');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE taille');
        $this->addSql('DROP TABLE utilisateur');
    }
}
