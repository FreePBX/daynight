��    8      �  O   �      �  )   �  (        ,     2     9     A     E     R  *   _  z  �  	   	     	     !	     :	     U	     u	  #   �	     �	  �   �	     _
     l
     t
     {
  -   �
  ?   �
  >   �
     4  %   A  $   g     �    �      �     �  {   �  �   c     �     �          '     9     O  ?   j     �  &   �  (   �          0     L     R     X  �   _  w   �     m  �   �  Q   %  �  w  4   =  6   r     �     �  
   �     �     �     �  >     {  J     �     �  '   �  1     9   O  2   �  @   �  0   �  �   .     �     �     �     �  D   �  a   6  a   �     �  4     5   =  '   s    �  2   �"  "   �"  �   #  �   �#     |$     �$  $   �$      �$     �$  &   %  Y   8%  3   �%  >   �%  >   &  #   D&  #   h&     �&  
   �&  
   �&  �   �&  �   M'     �'  $  (  �   6)                         (          7            0   "   8   6              !      '                1          5           &             -              4   )   +       ,                            #   /       	       %   *   
                 .      3      $                       2         - Force Time Condition False Destination  - Force Time Condition True Destination : Add : Edit Actions Add Add Callflow Applications Are you sure you want to delete this flow? By default, the Call Flow Control module will not hook Time Conditions allowing one to associate a call flow toggle feauture code with a time condition since time conditions have their own feature code as of version 2.9. If there is already an associaiton configured (on an upgraded system), this will have no affect for the Time Conditions that are effected. Setting this to true reverts the 2.8 and prior behavior by allowing for the use of a call flow toggle to be associated with a time conditon. This can be useful for two scenarios. First, to override a Time Condition without the automatic resetting that occurs with the built in Time Condition overrides. The second use is the ability to associate a single call flow toggle with multiple time conditions thus creating a <b>master switch</b> that can be used to override several possible call flows through different time conditions. Call Flow Call Flow Control Call Flow Control Module Call Flow Toggle (%s) : %s Call Flow Toggle Associate with Call Flow Toggle Control Call Flow Toggle Feature Code Index Call Flow Toggle: %s (%s) Call Flow manual toggle control - allows for two destinations to be chosen and provides a feature code		that toggles between the two destinations. Current Mode Default Delete Description Description for this Call Flow Toggle Control Destination to use when set to Normal Flow (Green/BLF off) mode Destination to use when set to Override Flow (Red/BLF on) mode Feature Code Forces to Normal Mode (Green/BLF off) Forces to Override Mode (Red/BLF on) Hook Time Conditions Module If a selection is made, this timecondition will be associated with the specified call flow toggle  featurecode. This means that if the Call Flow Feature code is set to override (Red/BLF on) then this time condition will always go to its True destination if the chosen association is to 'Force Time Condition True Destination' and it will always go to its False destination if the association is with the 'Force Time Condition False Destination'. When the associated Call Flow Control Feature code is in its Normal mode (Green/BLF off), then then this Time Condition will operate as normal based on the current time. The Destinations that are part of any Associated Call Flow Control Feature Code will have no affect on where a call will go if passing through this time condition. The only thing that is done when making an association is allowing the override state of a Call Flow Toggle to force this time condition to always follow one of its two destinations when that associated Call Flow Toggle is in its override (Red/BLF on) state. Linked to Time Condition %s - %s List Callflows Message to be played in normal mode (Green/BLF off).<br>To add additional recordings use the "System Recordings" MENU above Message to be played in override mode (Red/BLF on).<br>To add additional recordings use the "System Recordings" MENU to the above No Association Normal (Green/BLF off) Normal Flow (Green/BLF off) Optional Password Override (Red/BLF on) Override Flow (Red/BLF on) Please enter a valid numeric password, only numbers are allowed Please set the Current Mode Please set the Normal Flow destination Please set the Override Flow destination Recording for Normal Mode Recording for Override Mode Reset State Submit There are a total of %s Feature code objects, %s, each can control a call flow and be toggled using the call flow toggle feature code plus the index. This will change the current state for this Call Flow Toggle Control, or set the initial state when creating a new one. Time Condition Reference You can optionally include a password to authenticate before toggling the call flow. If left blank anyone can use the feature code and it will be un-protected You have reached the maximum limit for flow controls. Delete one to add a new one Project-Id-Version: PACKAGE VERSION
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2018-08-20 12:46-0400
PO-Revision-Date: 2016-05-26 19:05+0200
Last-Translator: Media <mousavi.media@gmail.com>
Language-Team: Persian (Iran) <http://weblate.freepbx.org/projects/freepbx/daynight/fa_IR/>
Language: fa_IR
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=2; plural=n != 1;
X-Generator: Weblate 2.4
  - تحمیل شرط زمانی به مقصد غلط  - تحمیل شرط زمانی به مقصد درست :افزودن :ویرایش اعمال افزودن افزودن روند تماس درخواست آیا از حذف این روند اطمینان دارید؟ By default, the Call Flow Control module will  not hook Time Conditions allowing one to associate a call flow toggle feauture code with a time condition since time conditions have their own feature code as of version 2.9. If there is already an associaiton configured (on an upgraded system), this will have no affect for the Time Conditions that are effected. Setting this to true reverts the 2.8 and prior behavior by allowing for the use of a call flow toggle to be associated with a time conditon. This can be useful for two scenarios. First, to override a Time Condition without the automatic resetting that occurs with the built in Time Condition overrides. The second use is the ability to associate a single call flow toggle with multiple time conditions thus creating a <b>master switch</b> that can be used to override several possible call flows through different time conditions. روند تماس کنترل روند تماس ماژول کنترل روند تماس تغییر وضعیت روند تماس (%s) : %s تغییر وضعیت روند تماس وابسته با کنترل تغییر وضعیت روند تماس فهرست کد ویژه تغییر وضعیت روند تماس تغییر وضعیت روند تماس: %s (%s) Call Flow manual toggle control - allows for two  destinations to be chosen and provides a feature code		that toggles between the two destinations. حالت کنونی پیشفرض حذف شرح شرحی برای کنترل تغییر وضعیت روند تماس مقصد مورد استفاده وقتی حالت روند نرمال تنظیم شده باشد مقصد مورد استفاده وقتی حالت روند ابطال تنظیم شده باشد کد ویژه تحمیل به حالت نرمال(سبز/BLF off ) تحمیل به حالت ابطال (قرمز/BLF on) ماژول هوک شرایط زمانی If a selection is made, this timecondition will be  associated with the specified call flow toggle  featurecode. This means that if the Call Flow Feature code is set to override (Red/BLF on) then this time condition will always go to its True destination if the chosen association is to 'Force Time Condition True Destination' and it will always go to its False destination if the association is with the 'Force Time Condition False Destination'. When the associated Call Flow Control Feature code is in its Normal mode (Green/BLF off), then then this Time Condition will operate as normal based on the current time. The Destinations that are part of any Associated Call Flow Control Feature Code will have no affect on where a call will go if passing through this time condition. The only thing that is done when making an association is allowing the override state of a Call Flow Toggle to force this time condition to always follow one of its two destinations when that associated Call Flow Toggle is in its override (Red/BLF on) state. متصل شده به شرایط زمانی %s - %s فهرست روندهای تماس پیام برای پخش در حالت معمولی (سبز/BLF off).<br>برای افزودن فایل جدید از منوی "ضبط شده های سیستمی" استفاده کنید پیام برای پخش در حالت بازنویسی.(قرمز/BLF on).<br>برای افزودن فایل جدید از منوی "ضبط شده های سیستمی" استفاده کنید هیچ ارتباطی نرمال(سبز/BLF off) روند نرمال (سبز/BLF off) کلمه عبور اختیاری ابطال (قرمز/ BLF on) ابطال روند (قرمز/ BLF on) لطفا یک کلمه عبور عددی وارد کنید،فقط عدد مجاز است لطفا حالت فعلی را تنظیم کنید لطفا مقصد روند نرمال را تنظیم کنید لطفا مقصد روند ابطال را تنظیم کنید ضبط برای حالت نرمال ضبط برای حالت ابطال تنظیم مجدد کیفیت ارسال There are a total of %s Feature code  objects, %s, each can control a call flow and be toggled using the call flow toggle feature code plus the index. این وضعیت فعلی روند کنترل تماس را تغییر میدهد، یا وضعیت فعلی را برای مورد جدید تنظیم میکند. مرجع شرایط زمانی شما میتوانید قبل از ورود به روند تماس برای احراز هویت یک کلمه عبور انتخاب کنید. اگر خالی بگذارید هرکسی میتواند از کد ویژه استفاده کند و این مورد باعث ناامنی میشود شما از حداکثر روند تماس استفاده کرده اید. برای افزودن مورد جدید یک مورد را حذف کنید 