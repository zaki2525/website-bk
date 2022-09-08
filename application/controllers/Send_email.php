<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email extends CI_Controller {

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index()
    {
      // Konfigurasi email
      $config['protocol'] = 'sendmail';
      $config['mailpath'] = '/usr/sbin/sendmail';
      $config['charset'] = 'iso-8859-1';
      $config['wordwrap'] = TRUE;
      
      $this->email->initialize($config);

        $this->load->library('email');

        $this->email->from('your@example.com', 'Your Name');
        $this->email->to('mzakis272@gmail.com');
        $this->email->cc('');
        $this->email->bcc('');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
            show_error($this->email->print_debugger());
        }
    }
}