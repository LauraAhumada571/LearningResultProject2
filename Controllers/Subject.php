<?php
    class Subject extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function Subject(){
            $data['page_tag'] = 'Resultados de aprendizaje';
            $data['page_title'] = 'Resultados de aprendizaje';
            $data['page_functions_js'] = "functions_subjects_lr.js";
            $this->views->getView($this,"Subject",$data);
        }

        public function getSubject(){
            $htmlOptions = "";
            $arrData = $this->model->searchAllSubject();
            if(count($arrData) > 0){
                for($i = 0; $i <count($arrData); $i++){
                    $htmlOptions .= '<option value="'.$arrData[$i]['codigo'].'">'.$arrData[$i]['nombre'].'</option>';
                }
            }
            echo $htmlOptions;
            die();
        }

        public function getSubjectById(int $codeLR){
            $arrData = $this->model->searchAllSubjectByLR($codeLR);
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>