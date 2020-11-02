<?php

class ControllerJournal3Ajax extends Controller {

    protected $data = array();

    

    public function checkuser() {
        $data = [];
        $this->load->model('account/customer');
        if($this->request->post['mobile'] != ''){
            /**
             * If user is exist then logged into user account,
             * If user is not exist then redirect to register or show msg
             */
            $otp_pin = mt_rand(10000, 99999);
            $isExistCustomer = $this->model_account_customer->getCustomerByMobile($this->request->post['mobile'], $otp_pin);
           
                   
            if(!isset($isExistCustomer['email'])){
                $data['error'] = true;
                $data['msg'] = 'Please register your account.';        
            //     $this->request->post['otp_pin'] = $otp_pin;
            //     $this->request->post['telephone'] = $this->request->post['mobile'];
            //     $this->request->post['firstname'] = 'New';
            //     $this->request->post['lastname'] = 'User';
            //     $this->request->post['email'] = $this->request->post['mobile'].'@machili.com';
            //     $this->request->post['password'] = '';
            //     $customer_id = $this->model_account_customer->addCustomerNew($this->request->post);		
            //     echo $customer_id;die;
            //     // Clear any previous login attempts for unregistered accounts.
            //     $this->model_account_customer->deleteLoginAttempts($this->request->post['mobile'].'@machili.com');

            //     // $this->customer->login($this->request->post['mobile'].'@machili.com', '', true);

            //     unset($this->session->data['guest']);
            //     // $this->session->data['new_user_telephoe'] = $this->request->post['telephone'];
            //     // $this->session->data['new_customer_id'] = $customer_id;
            }else{
                $sms = new Sms('smscountry');
                $sms->setTo($this->request->post['mobile']);
                $sms->setText($otp_pin);
                $sms->sendOTP();

                $data['error'] = false;
                $data['msg'] = 'Successfully sent OTP to your mobile.';
            }
        } else {
            $data['error'] = true;
            $data['msg'] = 'Please enter mobile no.';
        }        
        $this->response->setOutput(json_encode($data));		
    }

    public function verifyotp() {
        $data = [];
        if($this->request->post['otp'] != ''){
            $this->load->model('account/customer');
            $isVerified = $this->model_account_customer->verifyOTP(array('otp_pin' => $this->request->post['otp'], 'telephone' => $this->request->post['mobile']));

            if ($isVerified && $this->customer->login($isVerified['email'], '', true)) {
                // Default Addresses
                $this->load->model('account/address');

                if ($this->config->get('config_tax_customer') == 'payment') {
                    $this->session->data['payment_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
                }

                if ($this->config->get('config_tax_customer') == 'shipping') {
                    $this->session->data['shipping_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
                }

               // $this->response->redirect($this->url->link('common/home', '', true));
            }
            if(!$isVerified){
                $data['error'] = true;
                $data['msg'] = 'Please enter valid OTP!';
            }else{
                $data['error'] = false;
                $data['msg'] = 'successfully verified OTP.';
                $data['redirect'] = $this->url->link('common/home', '', true);
                // unset($this->session->data['new_customer_id']);
                // unset($this->session->data['new_user_telephoe']);
            }				
        }else{
            $data['error'] = true;
            $data['msg'] = 'Please enter OTP!';
        }
        $this->response->setOutput(json_encode($data));
    }

    public function userlogin() {
        $data = [];
        if($this->request->post['email'] != '' && $this->request->post['password'] != ''){
            $this->load->model('account/customer');

            if ($this->customer->login($this->request->post['email'], $this->request->post['password'], false, true)) {
                // Default Addresses
                $this->load->model('account/address');

                if ($this->config->get('config_tax_customer') == 'payment') {
                    $this->session->data['payment_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
                }

                if ($this->config->get('config_tax_customer') == 'shipping') {
                    $this->session->data['shipping_address'] = $this->model_account_address->getAddress($this->customer->getAddressId());
                }

               // $this->response->redirect($this->url->link('common/home', '', true));
                $data['error'] = false;
                $data['msg'] = 'successfully verified the User.';
                $data['redirect'] = $this->url->link('product/category&path=60', '', true);
            }else{
                $data['error'] = true;
                $data['msg'] = 'Please enter valid the email/password!';
            }			
        }else{
            $data['error'] = true;
            $data['msg'] = 'Please enter the email/password!';
        }
        $this->response->setOutput(json_encode($data));
    }

}