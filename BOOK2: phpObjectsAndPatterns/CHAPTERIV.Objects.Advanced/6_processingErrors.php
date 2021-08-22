<?php
//  *** Обработка ошибок
//  *** Исключение - объект класса Exception, предназначены для хранения информации об ошибках или
//      выдачи сообщения о них. Конструктору класса Exception передаются 2 аргумента: строка сообщения
//      и код ошибки. 

//  \Exception

/*
    throw new \Exception -  этот оператор останавливает выполнение текущего кода и передает ответственность за
                        обработку ошибок обратно в вызывающий код.
*/

/* public function __construct (string $file) {
    $this->file = $file;
    
    if(!file_exists($file)) {
        throw new \Exception(" '$file' doesn't exist.");
    }

    $this->xml = simplexml_load_file($file);
} */

/* try {

} catch(\Exception $e) {
    die($e->__toString());
} */

//  Создание подклассов класса Exception

/* class XmlException extends \Exception {
    private $error;

    public function __construct(\LibXMLError $error) {
        $shortfile = basename($error->file);
        $msg = "[{$shortfile}, строка {$error->line}, стобец {$error->column}] {$error->message}";
        $this->error = $error;
        parent::__construct($msg, $error->code);  // сообщение и код ошибки
    }

    public function getLibXmlError() {
        return $this->error;
    }
}

class FileException extends \Exception {}

class ConfException extends \Exception {}

class Conf {
    private $file;
    private $xml;
    private $lastmatch;

    public function __construct(string $file) {
        $this->file = $file;

        if(!file_exists($file)) {                                   // new!
            throw new \FileException(" '$file' doesn't exist.");    // new!
        }                                                           // new!
        
        $this->xml = simplexml_load_file($file, null, LIBXML_NOERROR);  // new!

        if(! is_object($this->xml)) {                                   // new!
            throw new \XmlException(libxml_get_last_error());           // new!
        }                                                               // new!

        $matches = $this->xml->xpath("/conf");                          // new!
        if(! count($matches)) {                                         // new!
            throw new \ConfException("Root file not found: conf");      // new!
        }                                                               // new!
    }

    public function write() {
        if(! is_writable($this->file)) {                                    // new!
            throw new \FileException(" '{$this->file}' isn't writable");    // new!
        }                                                                   // new!

        file_put_contents($this->file, $this->xml->asXML());
    }

    public function get(string $str) {
        $matches = $this->xml->xpath("/conf/item[@name=\"$str\"]");
        if(count($matches)) {
            $this->lastmatch = $matches[0];
            return (string)$matches[0];
        }
        return null;
    }

    public function set(string $key, string $value) {
        if(! is_null($this->get($key))) {
            $this->lastmatch = $value;
            return;
        }
        $conf = $this->xml->conf;
        $this->xml->addChild('item', $value)->addAttribute('name', $key);
    }

    public static function init() {
        try{
            $conf = new Conf(__DIR__."conf.broken.xml");
            print "user: ".$conf->get('user')."\n";
            print "password: ".$conf->get('password')."\n";
            print "host: ".$conf->get('host')."\n";
            $conf->set("password", "newpass");
            $conf->write();
        }
        catch(FileException $e) {// File doesn't exist or not available }
        catch(XmlException $e) {// Broken XML file }
        catch(ConfException $e) {// Wrong XML file format }
        catch(\Exception $e) {// Mustn't be invited }
    }
}

/* <?xml version="1.0"?>
<conf>
    <item name="user">dino</item>
    <item name="password">newpass</item>
    <item name="host">localhost</item>
</conf> */


//  *** Очистка после операторов try/catch с помощью оператора finally

 /*class Runner extends Conf { 
    public static function init() {
        try{
            $fh = fopen(__DIR__."/log.txt", "a");
            fputs($fh, "Start\n");
            $conf = new Conf(dirname(__FILE__)."conf.broken.xml");
            print "user: ".$conf->get('user')."\n";
            print "host: ".$conf->get('host')."\n";
            $conf->set("password", "newpass");
            $conf->write();
        }
        catch(FileException $e) {
            // File doesn't exist or not available 
            fputs($fh, "Problem with file\n");
            throw $e;
        }
        catch(XmlException $e) {
            // Broken XML file 
            fputs($fh, "Problem(s) with XML file\n");
            throw $e;
        }
        catch(ConfException $e) {
            // Wrong XML file format 
            fputs($fh, "Problem(s) with configuration\n");
            throw $e;
        }
        catch(\Exception $e) {
            // Mustn't be invited 
            fputs($fh, "Not excepted problem(s)\n");
        }

        //  блок оператора finally вып-ся только если в блоке оператора try или catch 
        //  не вызываются функции die() или exit()
        finally{
            fputs($fh, "End\n");
            fclose($fh);
        }
    }   
 } */
