<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181010133101 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE empresa CHANGE tipo tipo VARCHAR(1) NOT NULL, CHANGE estado estado VARCHAR(1) NOT NULL');
        $this->addSql('ALTER TABLE almacen CHANGE idAlmacen idAlmacen VARCHAR(12) NOT NULL, CHANGE Empresa_RUC Empresa_RUC VARCHAR(11) DEFAULT NULL, CHANGE estado estado VARCHAR(1) NOT NULL');
        $this->addSql('ALTER TABLE aprobacion CHANGE idAprobacion idAprobacion VARCHAR(3) NOT NULL');
        $this->addSql('ALTER TABLE cargo CHANGE idCargo idCargo VARCHAR(3) NOT NULL');
        $this->addSql('ALTER TABLE categoria CHANGE idCategoria idCategoria VARCHAR(15) NOT NULL, CHANGE estado estado VARCHAR(1) NOT NULL');
        $this->addSql('ALTER TABLE comprobante CHANGE idComprobante idComprobante VARCHAR(11) NOT NULL, CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE detalle_guia DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE detalle_guia CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE detalle_guia ADD PRIMARY KEY (idPosicion, Guia_idGuia)');
        $this->addSql('ALTER TABLE detalle_pedido DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE detalle_pedido CHANGE estado estado VARCHAR(2) NOT NULL, CHANGE Detalle_solped_solped_idsolped Detalle_solped_solped_idsolped VARCHAR(16) DEFAULT NULL, CHANGE Detalle_solped_idposicion Detalle_solped_idposicion INT DEFAULT NULL');
        $this->addSql('ALTER TABLE detalle_pedido ADD PRIMARY KEY (idPosicion, Pedido_idPedido)');
        $this->addSql('ALTER TABLE detalle_peticion_oferta DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE detalle_peticion_oferta CHANGE detalle_solped_solped_idsolped detalle_solped_solped_idsolped VARCHAR(16) DEFAULT NULL, CHANGE detalle_solped_idposicion detalle_solped_idposicion INT DEFAULT NULL, CHANGE estado estado VARCHAR(2) NOT NULL');
        $this->addSql('ALTER TABLE detalle_peticion_oferta ADD PRIMARY KEY (idposicion, peticion_oferta_idpeticion_oferta)');
        $this->addSql('ALTER TABLE detalle_reserva DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE detalle_reserva CHANGE Ubicacion_idUbicacion Ubicacion_idUbicacion INT DEFAULT NULL, CHANGE estado estado VARCHAR(2) NOT NULL');
        $this->addSql('ALTER TABLE detalle_reserva ADD PRIMARY KEY (Res_Alm_Mat_pos, Reserva_idReserva)');
        $this->addSql('ALTER TABLE detalle_solped DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE detalle_solped CHANGE Material_idMaterial Material_idMaterial VARCHAR(16) DEFAULT NULL, CHANGE estado estado VARCHAR(2) NOT NULL');
        $this->addSql('ALTER TABLE detalle_solped ADD PRIMARY KEY (idposicion, solped_idsolped)');
        $this->addSql('ALTER TABLE devolucion CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE entrega CHANGE Detalle_Pedido_Pedido_idPedido Detalle_Pedido_Pedido_idPedido VARCHAR(16) DEFAULT NULL, CHANGE Detalle_Pedido_idPosicion Detalle_Pedido_idPosicion INT DEFAULT NULL, CHANGE Detalle_Guia_Guia_idGuia Detalle_Guia_Guia_idGuia VARCHAR(11) DEFAULT NULL, CHANGE Detalle_Guia_idPosicion Detalle_Guia_idPosicion INT DEFAULT NULL');
        $this->addSql('ALTER TABLE guia CHANGE idGuia idGuia VARCHAR(11) NOT NULL, CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE historial CHANGE fecha fecha DATETIME NOT NULL');
        $this->addSql('ALTER TABLE material CHANGE idMaterial idMaterial VARCHAR(16) NOT NULL, CHANGE Categoria_idCategoria Categoria_idCategoria VARCHAR(15) DEFAULT NULL, CHANGE UND_Medida_idUND_Medida UND_Medida_idUND_Medida VARCHAR(3) DEFAULT NULL, CHANGE estado estado VARCHAR(1) NOT NULL');
        $this->addSql('ALTER TABLE nivel CHANGE idNivel idNivel VARCHAR(3) NOT NULL, CHANGE Aprobacion_idAprobacion Aprobacion_idAprobacion VARCHAR(3) DEFAULT NULL');
        $this->addSql('ALTER TABLE pedido CHANGE idPedido idPedido VARCHAR(16) NOT NULL, CHANGE estado estado VARCHAR(2) NOT NULL');
        $this->addSql('ALTER TABLE peticion_oferta CHANGE idpeticion_oferta idpeticion_oferta VARCHAR(16) NOT NULL, CHANGE fecha fecha DATETIME NOT NULL, CHANGE estado estado VARCHAR(2) NOT NULL');
        $this->addSql('ALTER TABLE reserva CHANGE idReserva idReserva VARCHAR(16) NOT NULL, CHANGE estado estado VARCHAR(1) NOT NULL');
        $this->addSql('ALTER TABLE solped CHANGE idsolped idsolped VARCHAR(16) NOT NULL, CHANGE fecha fecha DATETIME NOT NULL, CHANGE estado estado VARCHAR(2) NOT NULL');
        $this->addSql('ALTER TABLE ubicacion CHANGE Almacen_idAlmacen Almacen_idAlmacen VARCHAR(12) DEFAULT NULL, CHANGE Material_idMaterial Material_idMaterial VARCHAR(16) DEFAULT NULL, CHANGE stock stock DOUBLE PRECISION NOT NULL, CHANGE estado estado VARCHAR(1) NOT NULL');
        $this->addSql('ALTER TABLE und_medida CHANGE idUND_Medida idUND_Medida VARCHAR(3) NOT NULL, CHANGE estado estado VARCHAR(1) NOT NULL');
        $this->addSql('ALTER TABLE usuario DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE usuario ADD idUsuario INT AUTO_INCREMENT NOT NULL, CHANGE fechaCreacion fechaCreacion DATETIME DEFAULT NULL, CHANGE codigoAutorizacion codigoAutorizacion VARCHAR(6) NOT NULL, CHANGE Cargo_idCargo Cargo_idCargo VARCHAR(3) DEFAULT NULL, CHANGE estado estado VARCHAR(1) NOT NULL');
        $this->addSql('ALTER TABLE usuario ADD PRIMARY KEY (idUsuario)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE almacen CHANGE idAlmacen idAlmacen VARCHAR(12) NOT NULL COLLATE utf8_general_ci, CHANGE estado estado CHAR(1) DEFAULT \'1\' NOT NULL COLLATE utf8_general_ci, CHANGE Empresa_RUC Empresa_RUC VARCHAR(11) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE aprobacion CHANGE idAprobacion idAprobacion CHAR(3) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE cargo CHANGE idCargo idCargo CHAR(3) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE categoria CHANGE idCategoria idCategoria VARCHAR(15) NOT NULL COLLATE utf8_general_ci, CHANGE estado estado CHAR(1) DEFAULT \'1\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE comprobante CHANGE idComprobante idComprobante VARCHAR(11) NOT NULL COLLATE utf8_general_ci, CHANGE fecha fecha DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE detalle_guia DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE detalle_guia CHANGE fecha fecha DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE detalle_guia ADD PRIMARY KEY (Guia_idGuia, idPosicion)');
        $this->addSql('ALTER TABLE detalle_pedido DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE detalle_pedido CHANGE estado estado CHAR(2) NOT NULL COLLATE utf8_general_ci, CHANGE Detalle_solped_solped_idsolped Detalle_solped_solped_idsolped VARCHAR(16) NOT NULL COLLATE utf8_general_ci, CHANGE Detalle_solped_idposicion Detalle_solped_idposicion INT NOT NULL');
        $this->addSql('ALTER TABLE detalle_pedido ADD PRIMARY KEY (Pedido_idPedido, idPosicion)');
        $this->addSql('ALTER TABLE detalle_peticion_oferta DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE detalle_peticion_oferta CHANGE detalle_solped_solped_idsolped detalle_solped_solped_idsolped VARCHAR(16) NOT NULL COLLATE utf8_general_ci, CHANGE detalle_solped_idposicion detalle_solped_idposicion INT NOT NULL, CHANGE estado estado CHAR(2) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE detalle_peticion_oferta ADD PRIMARY KEY (peticion_oferta_idpeticion_oferta, idposicion)');
        $this->addSql('ALTER TABLE detalle_reserva DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE detalle_reserva CHANGE estado estado CHAR(2) NOT NULL COLLATE utf8_general_ci, CHANGE Ubicacion_idUbicacion Ubicacion_idUbicacion INT NOT NULL');
        $this->addSql('ALTER TABLE detalle_reserva ADD PRIMARY KEY (Reserva_idReserva, Res_Alm_Mat_pos)');
        $this->addSql('ALTER TABLE detalle_solped DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE detalle_solped CHANGE estado estado CHAR(2) NOT NULL COLLATE utf8_general_ci, CHANGE Material_idMaterial Material_idMaterial VARCHAR(16) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE detalle_solped ADD PRIMARY KEY (solped_idsolped, idposicion)');
        $this->addSql('ALTER TABLE devolucion CHANGE fecha fecha DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE empresa CHANGE tipo tipo CHAR(1) DEFAULT \'1\' NOT NULL COLLATE utf8_general_ci, CHANGE estado estado CHAR(1) DEFAULT \'1\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE entrega CHANGE Detalle_Guia_Guia_idGuia Detalle_Guia_Guia_idGuia VARCHAR(11) NOT NULL COLLATE utf8_general_ci, CHANGE Detalle_Guia_idPosicion Detalle_Guia_idPosicion INT NOT NULL, CHANGE Detalle_Pedido_Pedido_idPedido Detalle_Pedido_Pedido_idPedido VARCHAR(16) NOT NULL COLLATE utf8_general_ci, CHANGE Detalle_Pedido_idPosicion Detalle_Pedido_idPosicion INT NOT NULL');
        $this->addSql('ALTER TABLE guia CHANGE idGuia idGuia VARCHAR(11) NOT NULL COLLATE utf8_general_ci, CHANGE fecha fecha DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE historial CHANGE fecha fecha DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE material CHANGE idMaterial idMaterial VARCHAR(16) NOT NULL COLLATE utf8_general_ci, CHANGE estado estado CHAR(1) NOT NULL COLLATE utf8_general_ci, CHANGE Categoria_idCategoria Categoria_idCategoria VARCHAR(15) NOT NULL COLLATE utf8_general_ci, CHANGE UND_Medida_idUND_Medida UND_Medida_idUND_Medida CHAR(3) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE nivel CHANGE idNivel idNivel CHAR(3) NOT NULL COLLATE utf8_general_ci, CHANGE Aprobacion_idAprobacion Aprobacion_idAprobacion CHAR(3) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE pedido CHANGE idPedido idPedido VARCHAR(16) NOT NULL COLLATE utf8_general_ci, CHANGE estado estado CHAR(2) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE peticion_oferta CHANGE idpeticion_oferta idpeticion_oferta VARCHAR(16) NOT NULL COLLATE utf8_general_ci, CHANGE fecha fecha DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE estado estado CHAR(2) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE reserva CHANGE idReserva idReserva VARCHAR(16) NOT NULL COLLATE utf8_general_ci, CHANGE estado estado CHAR(1) DEFAULT \'1\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE solped CHANGE idsolped idsolped VARCHAR(16) NOT NULL COLLATE utf8_general_ci, CHANGE fecha fecha DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE estado estado CHAR(2) DEFAULT \'1\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE ubicacion CHANGE stock stock DOUBLE PRECISION DEFAULT \'0\' NOT NULL, CHANGE estado estado CHAR(1) DEFAULT \'1\' NOT NULL COLLATE utf8_general_ci, CHANGE Almacen_idAlmacen Almacen_idAlmacen VARCHAR(12) NOT NULL COLLATE utf8_general_ci, CHANGE Material_idMaterial Material_idMaterial VARCHAR(16) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE und_medida CHANGE idUND_Medida idUND_Medida CHAR(3) NOT NULL COLLATE utf8_general_ci, CHANGE estado estado CHAR(1) DEFAULT \'1\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE usuario MODIFY idUsuario INT NOT NULL');
        $this->addSql('ALTER TABLE usuario DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE usuario DROP idUsuario, CHANGE fechaCreacion fechaCreacion DATETIME DEFAULT CURRENT_TIMESTAMP, CHANGE codigoAutorizacion codigoAutorizacion VARCHAR(6) DEFAULT \'0\' NOT NULL COLLATE utf8_general_ci, CHANGE estado estado CHAR(1) DEFAULT \'1\' NOT NULL COLLATE utf8_general_ci, CHANGE Cargo_idCargo Cargo_idCargo CHAR(3) DEFAULT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE usuario ADD PRIMARY KEY (DNI)');
    }
}
