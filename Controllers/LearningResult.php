<?php
    class LearningResult extends Controllers{

        public function __construct(){
            parent::__construct();
        }

        public function LearningResult(string $page){
            $page = intval(strClean($page));
            $data['page_tag'] = 'Resultados de aprendizaje';
            $data['page_title'] = 'Resultados de aprendizaje';
            $data['content'] = $this->getLearningResult($page);
            $data['pagination'] = ceil($this->getLearningResultAmount()/12);
            $data['page_functions_js'] = "functions_learning_result.js";
            $this->views->getView($this,"LearningResult",$data);
        }

        public function getLearningResultAmount(){
            $data = $this->model->searchLearningResultAmount();
            return $data[0]['amount']; 
        }

        public function getLearningResult(int $offset){
            $offset = $offset * 12;
            $data = $this->model->searchAllLearningResult($offset);
            return $data;
        }

        public function getLearningResultSelect(){
            $htmlOptions = "";
            $arrData = $this->model->searchAllLearningResultSelect();
            if(count($arrData) > 0){
                for($i = 0; $i <count($arrData); $i++){
                    $htmlOptions .= '<option value="'.$arrData[$i]['codigo'].'">'.$arrData[$i]['descripcion'].'</option>';
                }
            }
            echo $htmlOptions;
            die();
        }

        public function getLearningResultById(int $id){
            $id = intval(strClean($id));
            if($id > 0){
                $arrData = $this->model->searchLearningResultById($id);
                $this->getByIdLRMessage($arrData);
            }
            die();
        }

        private function getLastCode(){
            $data = $this->model->searchLastCode();
            return $data[0]['code'];
        }

        private function getByIdLRMessage($arrData){
            $arrResponse = "";
            if (empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            } else {
                $arrResponse = array('status' => true, 'msg' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            return $arrResponse;
        }
    }
?>