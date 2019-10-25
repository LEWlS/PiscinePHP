<?php

class Tyrion {
        public function sleepwith($name){
            if (get_class($name) == "Jaime")
                print("Not even if I'm drunk !" . PHP_EOL);
            if (get_class($name) == "Sansa")
                print("Let's do this." . PHP_EOL);
            if (get_class($name) == "Cersei")
                print("Not even if I'm drunk !" . PHP_EOL);
        }
    }

?>