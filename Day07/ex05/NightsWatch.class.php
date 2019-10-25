<?php
class NightsWatch{

        public function recruit($class){
            if (method_exists($class, 'fight'))
                return ($class->fight());
        }
        public function fight(){
        }
}
?>