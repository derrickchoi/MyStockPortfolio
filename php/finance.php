<?php
    
    class financeAPI {
        private $data;
        
    
        public function getData($tickers) {
        
            // set url
            $url = 'http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20%28%22%27'.implode(',',$tickers).'%27%22%29&env=store://datatables.org/alltableswithkeys';
        
            

            $options = array('Symbol','Name','Open','PreviousClose','PercentChange',
                                'LastTradePriceOnly');
            
            // request data
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $resp = curl_exec($ch);
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            //parse data
            if (!empty($options)) {
                $xml = new SimpleXMLElement($resp);
                $data = array();
                $col = array();
                if (is_object($xml)){
                    foreach($xml->results->quote as $quote){
                        $col=array();
                        foreach($options as $option){
                            $col[$option] = (string) $quote->$option;
                        }
                        $data[$col['Symbol']] = $col;
                    }
                } else{
                    $data = $resp;
                }
                // store it private data member
                $this->data = $data;
                var_dump($this->data);
            }
        }
        
        public function getCurrentPrice($ticker){
            return $this->data[$ticker]['LastTradePriceOnly'];
        }
        
        public function getPrevClosingPrice($ticker){
            return $this->data[$ticker]['PreviousClose'];
        }
        
        public function getOpeningPrice($ticker){
            return $this->data[$ticker]['Open'];
        }
        
        public function getPercentChanged($ticker){
            return $this->data[$ticker]['PercentChange'];
        }
        
        public function getCompanyName($ticker){
            echo $this->data[$ticker]['Name'];
        }
        
    
    }
    
     $f = new financeAPI();
     $f->getData(array('AAPL'));
     $f->getCompanyName('AAPL');
    



?>