<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Manage extends Core_Controller
{
    public function insert()
    {
    $data['s_em']=$this->input->post('s_em');
    $data['s_na']=$this->input->post('s_na');
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|jpe|pdf|doc|docx|rtf|text|txt';
    $this->load->library('upload', $config);
    if ( ! $this->upload->do_upload('file'))
    {
    $error = array('error' => $this->upload->display_errors());

    }

    else
    {

    $data['file']=$this->upload->data('file_name');


    }

    $this->Students_m->db_ins($data);


    $this->load->view('admin/newstudents');


    }

    public function edit($id)
    {
    $dt['da']=$this->Students_m->db_edit($id)->row_array();
    $this->load->view('admin/st_edt',$dt);
    }

    public function update()
    {
    $id=$this->input->post("id");

    $s_em=$this->input->post("s_em");
    $s_na=$this->input->post("s_na");

    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|jpe|pdf|doc|docx|rtf|text|txt';
    $this->load->library('upload', $config);
    if ( ! $this->upload->do_upload('file'))
    {
    $error = array('error' => $this->upload- >display_errors());
    }
    else
    {
    $upload_data=$this->upload->data();
    $image_name=$upload_data['file_name'];
    }

    $data=array('s_em'=>$s_em,'s_na'=>$s_na,'file'=>$image_name);
    $this->Students_m->db_update($data,$id);
    }

    redirect("home/manage");
    }

}