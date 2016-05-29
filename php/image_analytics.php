<?php
/**
 * Created by PhpStorm.
 * User: h_shirai
 * Date: 2016/05/29
 * Time: 16:06
 */

// http://iwasakiyouhei.com/post-4538/

$path = 'http://lineofficial.blogimg.jp/ja/imgs/2/b/2b5946bf.jpg';

$result = curl_init();
// curl url
curl_setopt($result, CURLOPT_URL, "https://vision.googleapis.com/v1/images:annotate?key=AIzaSyCONMr23_QPcoi2QXSaJUZImShTfmGH5Q0");


// post
curl_setopt($result, CURLOPT_CUSTOMREQUEST, 'POST');

// --data-binary
curl_setopt($result, CURLOPT_BINARYTRANSFER, true);

// header
curl_setopt($result, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));


curl_setopt($result, CURLOPT_REFERER, 'http://localhost');
curl_setopt($result, CURLOPT_AUTOREFERER, true);


// get response with text
curl_setopt($result, CURLOPT_RETURNTRANSFER, true);

// image file
//$file_contents = base64_encode(file_get_contents($path));
$file_contents= filter_input(INPUT_POST,'image');
$request = '{
            "requests": [
              {
                "image": {
                  "content": "' . $file_contents . '"
                   },
                   "features": [
                     {
                       "type": "FACE_DETECTION"
                        }
                     ]
            }
              ]
}';
curl_setopt($result, CURLOPT_POSTFIELDS, $request);

// result
$responses = curl_exec($result);

$response=json_decode($responses,true);

$count=count($response['responses'][0]['faceAnnotations']);
$like_key=0;
foreach($response['responses'][0]['faceAnnotations'] as $hoge){
	$like_key+=($hoge['joyLikelihood']=='VERY_LIKELY')?1:0;
}
echo $like_key / $count;

