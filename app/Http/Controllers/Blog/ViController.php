<?php
/**
 * Date: 2020/09/17
 * Time: 01:55 AM
 */

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;

class ViController extends Controller {

	public static function routes(){

		Route::group(['prefix'=>'vi'], function(){
			Route::get('detail', 'ViController@detail');
			Route::any('upload', 'ViController@upload');

		});
	}



	/**
	 * 网站详情页
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function detail(){
	    $article = DB::select("select * from article  order by id desc limit 1")[0];


        return view('blog', [
            'article'      => $article,
        ]);


	}


	public function upload()
    {



        if(!is_uploaded_file($_FILES['upfile']['tmp_name'])){
            echo "<script>alert('请上传一个有效文件');location.href='detail';</script>";
            exit(0);
        }
//2、判断文件格式
        $file=@$_FILES['upfile'];//var_dump($file);die;
        $isoktype=array("image/jpg","image/jpeg","image/pjpeg","image/gif","image/png");
        if(!in_array($file['type'],$isoktype)){
            echo "<script>alert('请上传一个格式正确的文件');location.href='detail';</script>";
            exit(0);
        }
//3、判断图片大小


        $isoksize=500000;
        if($isoksize<$file["size"]){
            echo "<script>alert('文件过大');location.href='detail';</script>";
            exit(0);
        }




//4、水印
//5、缩略图

        //图片重命名
$exe=substr($file['name'],stripos($file['name'], '.')+1);
$newname=time();
$newname.=rand();
//echo $newname.$exe;

//执行保存操作
$savadir=base_path('public/image/');


move_uploaded_file($file['tmp_name'],$savadir.$newname.'.'.$exe);//第一个参数是待上传文件的地址，第二个是上传后文件的地址

$c=$savadir.$newname.'.'.$exe;

$pic = '/image/'.$newname.'.'.$exe;
DB::insert("insert into article (`name`,pic) values(?,?)",['kkk',$pic]);


echo "上传成功           <a href='detail'>再次上传</a>";
echo "<script>parent.document.admin.picurl.value='$c';</script>";
}







}