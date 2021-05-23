/* eslint-disable */
require('./bootstrap');
require('tinymce/themes/silver')
require('tinymce/icons/default');
require('tinymce/plugins/image');
require('tinymce/plugins/code');
import axios from 'axios';
import tinymce from 'tinymce';

tinymce.init({
    selector:'textarea',
    height:200,
    skin:false,
    content_css:false,
    plugins:'image code',
    image_title: true,
    automatic_uploads: true,
    file_picker_types: 'image',
    images_upload_handler: function (blobInfo, success, failure) {
        let formData=new FormData();
        formData.append('file',blobInfo.blob());
        axios.post('/admin/upload',formData)
            .then(function(res){
                success(res.data.location);
            })
        },
    });
axios.get('/api/user',{
    'headers':{
        'Accept':'application/json',
        'Authorization':'Bearer 5eT2cvZniU9Jk7BIsQgLyVnbZ2OHANQucN4S4ZL8l5DfkY4h6lDD4D3dfRYK5xbFwgbnK5s3nyONROkC'
    }
}).then(res=>console.dir(res.data));