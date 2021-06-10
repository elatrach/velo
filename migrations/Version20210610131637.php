<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210610131637 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce_has_indisponibilite DROP FOREIGN KEY fk_annonce_has_indisponibilite_calendrier_indisponibilite1');
        $this->addSql('DROP INDEX fk_annonce_has_indisponibilite_calendrier_indisponibilite1_idx ON annonce_has_indisponibilite');
        $this->addSql('CREATE INDEX IDX_A13BD9672F7BEF0F ON annonce_has_indisponibilite (id_indisponible)');
        $this->addSql('ALTER TABLE annonce_has_indisponibilite ADD CONSTRAINT fk_annonce_has_indisponibilite_calendrier_indisponibilite1 FOREIGN KEY (id_indisponible) REFERENCES calendrier_indisponibilite (id_indisponible) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE reservation_has_cal_reservation DROP FOREIGN KEY fk_reservation_has_cal_reservation_calendrier_reservation1');
        $this->addSql('ALTER TABLE reservation_has_cal_reservation DROP FOREIGN KEY fk_reservation_has_cal_reservation_reservation1');
        $this->addSql('DROP INDEX fk_reservation_has_cal_reservation_calendrier_reservation1_idx ON reservation_has_cal_reservation');
        $this->addSql('CREATE INDEX IDX_EB175B9DA1615055 ON reservation_has_cal_reservation (id_calendrier_reservation)');
        $this->addSql('DROP INDEX fk_reservation_has_cal_reservation_reservation1_idx ON reservation_has_cal_reservation');
        $this->addSql('CREATE INDEX IDX_EB175B9D5ADA84A2 ON reservation_has_cal_reservation (id_reservation)');
        $this->addSql('ALTER TABLE reservation_has_cal_reservation ADD CONSTRAINT fk_reservation_has_cal_reservation_calendrier_reservation1 FOREIGN KEY (id_calendrier_reservation) REFERENCES calendrier_reservation (id_calendrier_reservation) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE reservation_has_cal_reservation ADD CONSTRAINT fk_reservation_has_cal_reservation_reservation1 FOREIGN KEY (id_reservation) REFERENCES reservation (id_reservation) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce_has_indisponibilite DROP FOREIGN KEY FK_A13BD9672F7BEF0F');
        $this->addSql('DROP INDEX idx_a13bd9672f7bef0f ON annonce_has_indisponibilite');
        $this->addSql('CREATE INDEX fk_annonce_has_indisponibilite_calendrier_indisponibilite1_idx ON annonce_has_indisponibilite (id_indisponible)');
        $this->addSql('ALTER TABLE annonce_has_indisponibilite ADD CONSTRAINT FK_A13BD9672F7BEF0F FOREIGN KEY (id_indisponible) REFERENCES calendrier_indisponibilite (id_indisponible)');
        $this->addSql('ALTER TABLE reservation_has_cal_reservation DROP FOREIGN KEY FK_EB175B9DA1615055');
        $this->addSql('ALTER TABLE reservation_has_cal_reservation DROP FOREIGN KEY FK_EB175B9D5ADA84A2');
        $this->addSql('DROP INDEX idx_eb175b9d5ada84a2 ON reservation_has_cal_reservation');
        $this->addSql('CREATE INDEX fk_reservation_has_cal_reservation_reservation1_idx ON reservation_has_cal_reservation (id_reservation)');
        $this->addSql('DROP INDEX idx_eb175b9da1615055 ON reservation_has_cal_reservation');
        $this->addSql('CREATE INDEX fk_reservation_has_cal_reservation_calendrier_reservation1_idx ON reservation_has_cal_reservation (id_calendrier_reservation)');
        $this->addSql('ALTER TABLE reservation_has_cal_reservation ADD CONSTRAINT FK_EB175B9DA1615055 FOREIGN KEY (id_calendrier_reservation) REFERENCES calendrier_reservation (id_calendrier_reservation)');
        $this->addSql('ALTER TABLE reservation_has_cal_reservation ADD CONSTRAINT FK_EB175B9D5ADA84A2 FOREIGN KEY (id_reservation) REFERENCES reservation (id_reservation)');
    }
}
