<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
    
     /*
     * function save the files temperorily 
     */
    public function actionUploadAttachments() {
        Yii::import( "xupload.models.XUploadForm" );
    //Here we define the paths where the files will be stored temporarily
        $path = realpath( Yii::app( )->getBasePath( )."/../../uploads/temp/" )."/";
        $publicPath = Yii::app( )->getBaseUrl( )."/../uploads/temp";

        //This is for IE which doens't handle 'Content-type: application/json' correctly
        header( 'Vary: Accept' );
        if( isset( $_SERVER['HTTP_ACCEPT'] ) 
            && (strpos( $_SERVER['HTTP_ACCEPT'], 'application/json' ) !== false) ) {
            header( 'Content-type: application/json' );
        } else {
            header( 'Content-type: text/plain' );
        }

        //Here we check if we are deleting and uploaded file
        if( isset( $_GET["_method"] ) ) {
            if( $_GET["_method"] == "delete" ) {
                if( $_GET["file"][0] !== '.' ) {
                    $file = $path.$_GET["file"];
                    if( is_file( $file ) ) {
                        unlink( $file );
                    }
                }
                echo json_encode( true );
            }
        } else {
            $model = new XUploadForm;
            $model->file = CUploadedFile::getInstance( $model, 'file' );
//            $model->previewImages = false;
            //We check that the file was successfully uploaded
            if( $model->file !== null ) {
                //Grab some data
                $model->mime_type = $model->file->getType( );
                $model->size = $model->file->getSize( );
                $model->name = $model->file->getName( );
                //(optional) Generate a random name for our file
                $filename = md5( Yii::app( )->user->id.microtime( ).$model->name);
                $filename .= ".".$model->file->getExtensionName( );
                if( $model->validate( ) ) {
                    //Move our file to our temporary dir
                    $model->file->saveAs( $path.$filename );
                    chmod( $path.$filename, 0777 );
                    //here you can also generate the image versions you need 
                    //using something like PHPThumb


                    //Now we need to save this path to the user's session
                    if( Yii::app( )->user->hasState( 'attachments' ) ) {
                        $userAttachments = Yii::app( )->user->getState( 'attachments' );
                    } else {
                        $userAttachments = array();
                    }
                     $userAttachments[] = array(
                        "path" => $path.$filename,
                        //the same file or a thumb version that you generated
                        "thumb" => $path.$filename,
                        "filename" => $filename,
                        'size' => $model->size,
                        'mime' => $model->mime_type,
                        'name' => $model->name,
                    );
                    Yii::app( )->user->setState('attachments', $userAttachments );

                    //Now we need to tell our widget that the upload was succesfull
                    //We do so, using the json structure defined in
                    // https://github.com/blueimp/jQuery-File-Upload/wiki/Setup
                    echo json_encode( array( array(
                            "name" => $model->name,
                            "type" => $model->mime_type,
                            "size" => $model->size,
                            "url" => $publicPath.$filename,
//                            "thumbnail_url" => $publicPath."thumbs/$filename",
                            "delete_url" => $this->createUrl( "upload", array(
                                "_method" => "delete",
                                "file" => $filename
                            ) ),
                            "delete_type" => "POST"
                        ) ) );
                } else {
                    //If the upload failed for some reason we log some data and let the widget know
                    echo json_encode( array( 
                        array( "error" => $model->getErrors( 'file' ),
                    ) ) );
                    Yii::log( "XUploadAction: ".CVarDumper::dumpAsString( $model->getErrors( ) ),
                        CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction" 
                    );
                }
            } else {
                throw new CHttpException( 500, "Could not upload file" );
            }
        }
    }
}