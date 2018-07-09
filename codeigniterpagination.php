<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>

<style>
body {
font-family: 'Raleway', sans-serif;
}
.main
{
width: 1015px;
position: absolute;
top: 10%;
left: 20%;
}
#form_head
{
text-align: center;
background-color: #61CAFA;
height: 66px;
margin: 0 0 -29px 0;
padding-top: 35px;
border-radius: 8px 8px 0 0;
color: rgb(255, 255, 255);
}
#content {
position: absolute;
width: 450px;
height: 390px;
border: 2px solid gray;
border-radius: 10px;
}
#form_input
{
margin-left: 110px;
margin-top: 30px;
}
label
{
margin-right: 6px;
font-weight: bold;
}
#pagination{
margin: 40 40 0;
}
.input_text {
display: inline;
margin: 100px;
}
.input_name {
display: inline;
margin: 65px;
}
.input_email {
display: inline;
margin-left: 73px;
}
.input_num {
display: inline;
margin: 36px;
}
.input_country {
display: inline;
margin: 53px;
}
ul.tsc_pagination li a
{
border:solid 1px;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
padding:6px 9px 6px 9px;
}
ul.tsc_pagination li
{
padding-bottom:1px;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
color:#FFFFFF;
box-shadow:0px 1px #EDEDED;
-moz-box-shadow:0px 1px #EDEDED;
-webkit-box-shadow:0px 1px #EDEDED;
}
ul.tsc_pagination
{
margin:4px 0;
padding:0px;
height:100%;
overflow:hidden;
font:12px 'Tahoma';
list-style-type:none;
}
ul.tsc_pagination li
{
float:left;
margin:0px;
padding:0px;
margin-left:5px;
}
ul.tsc_pagination li a
{
color:black;
display:block;
text-decoration:none;
padding:7px 10px 7px 10px;
}
ul.tsc_pagination li a img
{
border:none;
}
ul.tsc_pagination li a
{
color:#0A7EC5;
border-color:#8DC5E6;
background:#F8FCFF;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
text-shadow:0px 1px #388DBE;
border-color:#3390CA;
background:#58B0E7;
background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
}
</style>

<!-- view -->
<table cellspacing="0" cellpadding="0">
<tr>
<th>S.No</th>
<th>Name</th>
</tr>
<?php
$i=0;
foreach ($results as $data) {
	$i++;
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $data->your_name; ?></td>
</tr>
<?php
}
?>
</table>


<div id="pagination">
 <p><?php echo $links; ?></p>
</div>

<!-- end view -->


<!-- controller -->
<?php
public function contact_info(){
        $this->load->helper("url");
        $this->load->model("Pagination_model");
        $this->load->library("pagination");
         $config = array();
        $config["base_url"] = base_url() . "index.php/user/contact_info";
        $config["total_rows"] = $this->Pagination_model->record_count();
        $config["per_page"] = 1;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->Pagination_model->
            fetch_countries($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view("backend/pagination_view", $data);
}
?>
<!-- end controller -->

<!-- model -->

<?php
public function record_count() {
        return $this->db->count_all("contact_details");
    }

    public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("contact_details");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   ?>
<!-- end model -->