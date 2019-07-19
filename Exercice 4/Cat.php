<?php

namespace MyEvaluation;

	class Cat {
		private $_name;
        private $_age;
        private $_color;
        private $_sex;
		private static $_sexPossibilities = [
			'Male',
			'Female'
        ];
        private $_breed;

		public function __construct($name, $age, $color, $sex, $breed){
			$this->setName($name);
            $this->setAge($age);
            $this->setColor($color);
            $this->setSex($sex);
            $this->setBreed($breed);
		}

		// Getters
		public function getName() {
			return $this->_name;
		}

		public function getAge() {
			return $this->_age;
		}

        public function getColor() {
			return $this->_color;
        }
        public function getSex() {
			return $this->_sex;
        }
        public function getBreed() {
			return $this->_breed;
        }
        
		// Setters
		public function setName($name) {
			if(is_string($name) && (strlen($name) >= 3 && strlen($name)<= 20))
				$this->_name = $name;
			else
				echo 'Name not set cause you doesn\'t match constraints (3-20 characters)<br>';
        }
        
        public function setAge($age) {
			if(is_numeric($age) && ($age >= 0 && $age<= 15))
				$this->_age = $age;
			else
				echo 'Age not set cause you doesn\'t match constraints (number between 0 and 15)<br>';
        }

        public function setColor($color) {
			if(is_string($color) && (strlen($color) >= 3 && strlen($color) <= 10))
				$this->_color = $color;
			else
				echo 'Color not set cause you doesn\'t match constraints<br>';
        }
        
		public function setSex($sex) {
			if(in_array($sex, self::$_sexPossibilities))
				$this->_sex = $sex;
			else
				echo 'Sex not set cause you doesn\'t match constraints (Male or Female)<br>';
        }
        public function setBreed($breed) {
			if(is_string($breed) && (strlen($breed) >= 3 && strlen($breed)<= 20))
				$this->_breed = $breed;
			else
				echo 'Breed not set cause you doesn\'t match constraints (3-20 characters)<br>';
        }

        //Get all Infos

        public function getInfos(){
            $catInfos["Name"] = $this->getName();
            $catInfos["Age"] = $this->getAge();
            $catInfos["Color"] = $this->getColor();
            $catInfos["Sex"] = $this->getSex();
            $catInfos["Breed"] = $this->getBreed();
            //return infos
            return $catInfos;
        }
	}


 ?>