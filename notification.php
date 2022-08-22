
    public function notification()
    {
        $TXNDATE = $this->request->getVar('TXNDATE');
        $TXNSTATUS = $this->request->getVar('TXNSTATUS');
        $ACQUIRER = $this->request->getVar('ACQUIRER');
        $MERCHANTPAN = $this->request->getVar('MERCHANTPAN');
        $ISSUERNAME = $this->request->getVar('ISSUERNAME');
        $ISSUERID = $this->request->getVar('ISSUERID');
        $CONVENIENCEFEE = $this->request->getVar('CONVENIENCEFEE');
        $AMOUNT = $this->request->getVar('AMOUNT');
        $WORDS = $this->request->getVar('WORDS');
        $CUSTOMERPAN = $this->request->getVar('CUSTOMERPAN');
        $TERMINALID = $this->request->getVar('TERMINALID');
        $ORIGIN = $this->request->getVar('ORIGIN');
        $INVOICE = $this->request->getVar('INVOICE');
        $TRANSACTIONID = $this->request->getVar('TRANSACTIONID');
        $REFERENCEID = $this->request->getVar('REFERENCEID');
        $sharedkey = 'NVDdIc0qroJAJ6Ek';
        $abc = $ISSUERID . $TXNDATE . $MERCHANTPAN . $INVOICE . $sharedkey; //ClientId, SharedKey, systrace  (ISSUERID + TXNDATE + MERCHANTPAN + INVOICE + sharedKey)
        $hash = sha1($abc);
        $data = [
            'status' => 'Success'
        ];
        $datafailed = [
            'status' => 'Failed'
        ];
        if ($WORDS == $hash) {
            return $this->response->setJson($data);
        } else {
            return $this->response->setJson($datafailed);
        }
    }
