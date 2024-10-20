<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241018143411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book_category (book_id UUID NOT NULL, category_id INT NOT NULL, PRIMARY KEY(book_id, category_id))');
        $this->addSql('CREATE INDEX IDX_1FB30F9816A2B381 ON book_category (book_id)');
        $this->addSql('CREATE INDEX IDX_1FB30F9812469DE2 ON book_category (category_id)');
        $this->addSql('CREATE TABLE category (id INT GENERATED BY DEFAULT AS IDENTITY NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE book_category ADD CONSTRAINT FK_1FB30F9816A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book_category ADD CONSTRAINT FK_1FB30F9812469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE book ALTER id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN book.id IS \'\'');
        $this->addSql('ALTER TABLE bookmark ALTER id TYPE UUID');
        $this->addSql('ALTER TABLE bookmark ALTER user_id TYPE UUID');
        $this->addSql('ALTER TABLE bookmark ALTER book_id TYPE UUID');
        $this->addSql('ALTER TABLE bookmark ALTER bookmarked_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN bookmark.id IS \'\'');
        $this->addSql('COMMENT ON COLUMN bookmark.user_id IS \'\'');
        $this->addSql('COMMENT ON COLUMN bookmark.book_id IS \'\'');
        $this->addSql('COMMENT ON COLUMN bookmark.bookmarked_at IS \'\'');
        $this->addSql('ALTER TABLE parchment ALTER id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN parchment.id IS \'\'');
        $this->addSql('ALTER TABLE review ALTER id TYPE UUID');
        $this->addSql('ALTER TABLE review ALTER user_id TYPE UUID');
        $this->addSql('ALTER TABLE review ALTER book_id TYPE UUID');
        $this->addSql('ALTER TABLE review ALTER published_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN review.id IS \'\'');
        $this->addSql('COMMENT ON COLUMN review.user_id IS \'\'');
        $this->addSql('COMMENT ON COLUMN review.book_id IS \'\'');
        $this->addSql('COMMENT ON COLUMN review.published_at IS \'\'');
        $this->addSql('ALTER TABLE "user" ALTER id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN "user".id IS \'\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE book_category DROP CONSTRAINT FK_1FB30F9816A2B381');
        $this->addSql('ALTER TABLE book_category DROP CONSTRAINT FK_1FB30F9812469DE2');
        $this->addSql('DROP TABLE book_category');
        $this->addSql('DROP TABLE category');
        $this->addSql('ALTER TABLE parchment ALTER id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN parchment.id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE book ALTER id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN book.id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE review ALTER id TYPE UUID');
        $this->addSql('ALTER TABLE review ALTER published_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE review ALTER user_id TYPE UUID');
        $this->addSql('ALTER TABLE review ALTER book_id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN review.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN review.published_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN review.user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN review.book_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE "user" ALTER id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN "user".id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE bookmark ALTER id TYPE UUID');
        $this->addSql('ALTER TABLE bookmark ALTER bookmarked_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE bookmark ALTER user_id TYPE UUID');
        $this->addSql('ALTER TABLE bookmark ALTER book_id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN bookmark.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN bookmark.bookmarked_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN bookmark.user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN bookmark.book_id IS \'(DC2Type:uuid)\'');
    }
}
