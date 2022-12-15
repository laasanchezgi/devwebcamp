<?php

    namespace Model;

    class Evento extends ActiveRecord {
        // BD
        protected static $tabla = 'eventos';
        protected static $columnasDB = ['id', 'nombre', 'descripcion', 'disponibles', 'categoria_id', 'dia_id', 'hora_id', 'ponente_id'];
        
        // Declarando los atributos
        public $id;
        public $nombre;
        public $descripcion;
        public $disponibles;
        public $categoria_id;
        public $dia_id;
        public $hora_id;
        public $ponente_id;

        // Constructor
        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? null;
            $this->nombre = $args['nombre'] ?? '';
            $this->descripcion = $args['descripcion'] ?? '';
            $this->disponibles = $args['disponibles'] ?? '';
            $this->categoria_id = $args['categoria_id'] ?? '';
            $this->dia_id = $args['dia_id'] ?? '';
            $this->hora_id = $args['hora_id'] ?? '';
            $this->ponente_id = $args['ponente_id'] ?? '';
        }

        // Validación
        // Mensajes de validación para la creación de un evento
        public function validar() {
            if(!$this->nombre) {
                self::$alertas['error'][] = 'El nombre es obligatorio';
            }
            if(!$this->descripcion) {
                self::$alertas['error'][] = 'La descripción es obligatoria';
            }
            if(!$this->categoria_id  || !filter_var($this->categoria_id, FILTER_VALIDATE_INT)) {
                self::$alertas['error'][] = 'Elige una categoría';
            }
            if(!$this->dia_id  || !filter_var($this->dia_id, FILTER_VALIDATE_INT)) {
                self::$alertas['error'][] = 'Elige el día del evento';
            }
            if(!$this->hora_id  || !filter_var($this->hora_id, FILTER_VALIDATE_INT)) {
                self::$alertas['error'][] = 'Elige la hora del evento';
            }
            if(!$this->disponibles  || !filter_var($this->disponibles, FILTER_VALIDATE_INT)) {
                self::$alertas['error'][] = 'Añade una cantidad de lugares disponibles';
            }
            if(!$this->ponente_id || !filter_var($this->ponente_id, FILTER_VALIDATE_INT) ) {
                self::$alertas['error'][] = 'Selecciona la persona encargada del evento';
            }
            return self::$alertas;
        }
    }