<?php
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['name'];
        $code = $_POST['code'];
        
        $stmt = $con->prepare("SELECT * FROM language WHERE code = ? ");
        $stmt->execute([$code]);
        $Count = $stmt->rowCount();
        
        if($Count > 1){
             echo errorMessage('لقد أدخلت رمز موجود مسبقا');
        } else {
            $stmt = $con->prepare('INSERT INTO `language` (`name`, `code`) VALUES (?,?)');
            $stmt->execute([$name,$code]);
            if($stmt) {
                 $stmt = $con->prepare("SELECT id FROM language ORDER BY ID DESC LIMIT 1");
                 $stmt->execute();
                 $id = $stmt->fetch();
                
                 $stmt = $con->prepare("INSERT INTO `translation` (`key_id`,`word`,`lang`) 
                                        VALUES ('1' , 'empty', '".$id['id']."'),
                                               ('2' , 'empty', '".$id['id']."'),
                                               ('3' , 'empty', '".$id['id']."'),
                                               ('4' , 'empty', '".$id['id']."'),
                                               ('5' , 'empty', '".$id['id']."'),
                                               ('6' , 'empty', '".$id['id']."'),
                                               ('6' , 'empty', '".$id['id']."'),
                                               ('7' , 'empty', '".$id['id']."'),
                                               ('8' , 'empty', '".$id['id']."'),
                                               ('9' , 'empty', '".$id['id']."'),
                                               ('10', 'empty', '".$id['id']."'),
                                               ('11', 'empty', '".$id['id']."'),
                                               ('12', 'empty', '".$id['id']."'),
                                               ('13', 'empty', '".$id['id']."'),
                                               ('14', 'empty', '".$id['id']."'),
                                               ('15', 'empty', '".$id['id']."'),
                                               ('16', 'empty', '".$id['id']."'),
                                               ('17', 'empty', '".$id['id']."'),
                                               ('18', 'empty', '".$id['id']."'),
                                               ('19', 'empty', '".$id['id']."'),
                                               ('20', 'empty', '".$id['id']."'),
                                               ('21', 'empty', '".$id['id']."'),
                                               ('22', 'empty', '".$id['id']."'),
                                               ('23', 'empty', '".$id['id']."'),
                                               ('24', 'empty', '".$id['id']."'),
                                               ('25', 'empty', '".$id['id']."'),
                                               ('26', 'empty', '".$id['id']."'),
                                               ('27', 'empty', '".$id['id']."'),
                                               ('28', 'empty', '".$id['id']."'),
                                               ('29', 'empty', '".$id['id']."'),
                                               ('30', 'empty', '".$id['id']."'),
                                               ('31', 'empty', '".$id['id']."'),
                                               ('33', 'empty', '".$id['id']."'),
                                               ('34', 'empty', '".$id['id']."'),
                                               ('35', 'empty', '".$id['id']."'),
                                               ('36', 'empty', '".$id['id']."'),
                                               ('37', 'empty', '".$id['id']."'),
                                               ('38', 'empty', '".$id['id']."'),
                                               ('39', 'empty', '".$id['id']."'),
                                               ('40', 'empty', '".$id['id']."'),
                                               ('41', 'empty', '".$id['id']."'),
                                               ('42', 'empty', '".$id['id']."'),
                                               ('43', 'empty', '".$id['id']."'),
                                               ('44', 'empty', '".$id['id']."'),
                                               ('45', 'empty', '".$id['id']."'),
                                               ('46', 'empty', '".$id['id']."'),
                                               ('47', 'empty', '".$id['id']."'),
                                               ('48', 'empty', '".$id['id']."'),
                                               ('49', 'empty', '".$id['id']."'),
                                               ('50', 'empty', '".$id['id']."'),
                                               ('51', 'empty', '".$id['id']."'),
                                               ('52', 'empty', '".$id['id']."'),
                                               ('53', 'empty', '".$id['id']."'),
                                               ('54', 'empty', '".$id['id']."'),
                                               ('55', 'empty', '".$id['id']."'),
                                               ('56', 'empty', '".$id['id']."'),
                                               ('57', 'empty', '".$id['id']."'),
                                               ('58', 'empty', '".$id['id']."'),
                                               ('59', 'empty', '".$id['id']."'),
                                               ('60', 'empty', '".$id['id']."'),
                                               ('61', 'empty', '".$id['id']."'),
                                               ('62', 'empty', '".$id['id']."'),
                                               ('63', 'empty', '".$id['id']."'),
                                               ('64', 'empty', '".$id['id']."'),
                                               ('65', 'empty', '".$id['id']."'),
                                               ('66', 'empty', '".$id['id']."'),
                                               ('67', 'empty', '".$id['id']."'),
                                               ('68', 'empty', '".$id['id']."'),
                                               ('69', 'empty', '".$id['id']."'),
                                               ('70', 'empty', '".$id['id']."'),
                                               ('71', 'empty', '".$id['id']."'),
                                               ('73', 'empty', '".$id['id']."'),
                                               ('74', 'empty', '".$id['id']."'),
                                               ('75', 'empty', '".$id['id']."'),
                                               ('76', 'empty', '".$id['id']."'),
                                               ('77', 'empty', '".$id['id']."'),
                                               ('78', 'empty', '".$id['id']."'),
                                               ('79', 'empty', '".$id['id']."'),
                                               ('80', 'empty', '".$id['id']."'),
                                               ('81', 'empty', '".$id['id']."'),
                                               ('81', 'empty', '".$id['id']."')");
                
                
                 $stmt->execute();
                
                 if($stmt){
                     echo successMessage('تم إضافة قسم جديد');
                 }
            }
        }
        
        
    }