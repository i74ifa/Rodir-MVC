<div dir="rtl">

### اللغات 

[العربية](https://github.com/i74ifa/dbsystem/blob/main/Readme-ar.md) - 
[English](https://github.com/i74ifa/dbsystem/)



# التعليمات

## الميزات

- تحديد البيانات
- ادخال البيانات
- ملف ضبط المشروع `define` - config/app.php
- ونبذة كيف تنشى ملف ضبط المشروع وقواعد البيانات
- ميثود خاصة لتهيئة البيانات قبل ارسالها لقواعد البيانات
- مخطط البيانات
  - INT
  - TEXT
  - VARCHAR
  - BigIneger
  - Timestamps [created_at & updated_at]

## كيف تعد المشروع لبدا العمل

- ثبت هذه المكتبة ب استخدام composer
  - composer require i74ifa/dbsystem
- او تستطيع تنزيل المشروع وضبطة في مشروعك بدون استخدام Composer

## كيفية الاستخدام

- `تحتاج الى تفعيل الجلسات لان اخطاء قواعد البيانات تخزن في $_SESSION['errors']`
<div dir="ltr">

        session_start();
        require "vendor/autoload.php";
        use DBsystem74I\Database\DB;

        $DB = new DB;
</div >

*  لنتفرض انك ورثت اوبجت   `DB$`

### تحديد البيانات
<div dir="ltr">

      $result = $DB->table('nametable')->Select(['*'])->run();

      foreach ($result as $row) {
        echo $row['nameCol1'] . '<br>';
        echo $row['nameCol2'] . '<br>';
      }
</div>

###  ادخال البيانات

  - هناك <span dir="ltr"> INSERT() & INSERTCol() </span>
  - <span dir="ltr">`INSERT()` </span>

    - هذا الميثود لادخال جميع الاعمدة بدون استثناء 

      - لن تحتاج الى كتابة اسماء الاعمدة عند ادخال البيانات
      
      
<div dir="ltr">


    //Data in Table users
    |---------------------------------|
    | id | name | username | password |

</div>

  - ادخال جميع البيانات الى جميع الاعمدة :


<div dir="ltr">

    $DB->table('users')->INSERT([1, 'anyName', 'usernam'Password'])->run();

</div>

   - `INSERTCol()` </span>

  - استخدم هذا الميثود اذا كان لديك اعمدة تقبل ان تكون فارغة
  - مثل id  <span dir="ltr"> AUTO_INCREMENT </div> 
<div dir="ltr" >

    $DB->table('users')->INSERTCol(['name', 'username'], ['value name', 'value username'])->run();
</div>

<div dir="rtl">
 

++++++++++++++++++++
--------------------

### تهجير جدول الى قاعدة البيانات

+ ليست جاهزة بعد اذا ارت استخدامها 
* اذهب الى vendor/i74ifa/dbsystem/Migration/Migrate.php
* سوف ترا امثله كيف تنشى جدول 
* انشئ جدولك الخاص
* ادخل CLI واكتب 
    * php vendor/i74ifa/dbsystem/Using
    * migrate 
* سوف يتم ترحيل الجداول التي تم انشاءها في  migrate.php

