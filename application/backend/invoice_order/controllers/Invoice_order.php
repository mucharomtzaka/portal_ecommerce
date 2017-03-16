<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
Trefast Development
Trefast Development merupakan Start up Bussiness di bidang 
jasa pengembangan produk teknologi informasi  web development
*/
/*
@author: Mucharom
@Email :mucharomtzaka@yahoo.co.id / mucharomtzaka@gmail.com
@Alamat: Jl.Pagersari-Patean , Kendal 51354 Jawa Tengah
@HP/Whatapps:+6289692412261
@https://github.com/mucharomtzaka
@fanspage : https://www.facebook.com/trefast.teknik.indonesia 
homepage coming soon 
*/
class Invoice_order extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Invoice_order');
        $this->load->model(array('order_detail_pemesan/order_detail_pemesan_model',
        			 'order_pemesan/order_pemesan_model','bank_account/bank_account_model'));
        $this->load->helper(array('url','language'));
    }

    public function index($id='',$nama_pemesan=''){
                	if($nama_pemesan !='' && $id !=''){
                                $data_pemesan = $this->order_pemesan_model->get_by_id($id);
                                $data_detail_pesan = $this->order_detail_pemesan_model->get_by_name($nama_pemesan);
                                $this->data['detail_pesan'] = $data_detail_pesan;
                                $this->data['nama_pemesan'] = $data_pemesan->nama_pemesan;
                                $this->data['email_pemesan'] = $data_pemesan->email_pemesan;
                                $this->data['alamat_pemesan'] = $data_pemesan->alamat_pemesan;
                                $this->data['tanggal_order'] = $data_pemesan->tanggal;
                                $this->data['metode_bayar']  = $data_pemesan->metode_pembayaran;
                                $this->data['invoice_number'] = $data_pemesan->kode_invoice_order;
                                $this->data['id_order'] = $data_pemesan->id_order;
                                $this->data['bank_akun'] = $this->bank_account_model->get_all();
                                $this->data['title_invoice'] = 'Invoice order';
                               
                                $subtotal = $this->order_detail_pemesan_model->get_sum_total($nama_pemesan);
                                foreach($subtotal as $jml){
                                     $this->data['jumlah_harga_total'] =$this->cart->format_number($jml->total);
                                     $this->data['biaya_pengiriman'] = $this->cart->format_number($data_pemesan->deliveri);
                                     $this->data['total_bayar'] = $this->cart->format_number(intval($data_pemesan->deliveri)+intval($jml->total));
                                }
                                $this->template->render_backend('invoice',$this->data);       
                    }else{
                        redirect('welcome/view_erro_pages','refresh');
                    }
                    
    }

    public function export_pdf($id){
        $data_pemesan = $this->order_pemesan_model->get_by_id($id);
        $data_detail_pesan = $this->order_detail_pemesan_model->get_by_name($data_pemesan->nama_pemesan);
        $nama_file = date('Y-m-d')."_invoice-".$data_pemesan->kode_invoice_order."";    
        
        $this->data['detail_pesan'] = $data_detail_pesan;
        $this->data['nama_pemesan'] = $data_pemesan->nama_pemesan;
        $this->data['email_pemesan'] = $data_pemesan->email_pemesan;
        $this->data['alamat_pemesan'] = $data_pemesan->alamat_pemesan;
        $this->data['tanggal_order'] = $data_pemesan->tanggal;
        $this->data['metode_bayar']  = $data_pemesan->metode_pembayaran;
        $this->data['invoice_number'] = $data_pemesan->kode_invoice_order;
        $this->data['id_order'] = $data_pemesan->id_order;
        $this->data['bank_akun'] = $this->bank_account_model->get_all();
        $this->data['title_invoice'] = 'Invoice order';
                               
        $subtotal = $this->order_detail_pemesan_model->get_sum_total($data_pemesan->nama_pemesan);
        foreach($subtotal as $jml){
                $this->data['jumlah_harga_total'] =$this->cart->format_number($jml->total);
                $this->data['biaya_pengiriman'] = $this->cart->format_number($data_pemesan->deliveri);
                $this->data['total_bayar'] = $this->cart->format_number(intval($data_pemesan->deliveri)+intval($jml->total));
        }
        
        $this->load->view('Invoice_order/invoice',$this->data);

    }

   
}