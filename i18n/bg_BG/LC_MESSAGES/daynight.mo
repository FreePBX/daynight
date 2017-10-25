��            )   �      �  )   �  (   �     �  z       |     �     �     �     �  �   �     �     �  -   �  %   �  $   �         1      @     a     p     �     �     �     �  ?   �     &     @  w   \  �   �    s  _   �  a   �     F  �  [  ;   O  K   �  [   �  k   3  Z   �    �          2  �   C  S   �  T   "  K   w  �  �  7   |$     �$  ,   �$  7   �$     3%  (   @%  5   i%  s   �%  +   &  ,   ?&  #  l&  U  �'                                
                                                             	                                             - Force Time Condition False Destination  - Force Time Condition True Destination Applications By default, the Call Flow Control module will not hook Time Conditions allowing one to associate a call flow toggle feauture code with a time condition since time conditions have their own feature code as of version 2.9. If there is already an associaiton configured (on an upgraded system), this will have no affect for the Time Conditions that are effected. Setting this to true reverts the 2.8 and prior behavior by allowing for the use of a call flow toggle to be associated with a time conditon. This can be useful for two scenarios. First, to override a Time Condition without the automatic resetting that occurs with the built in Time Condition overrides. The second use is the ability to associate a single call flow toggle with multiple time conditions thus creating a <b>master switch</b> that can be used to override several possible call flows through different time conditions. Call Flow Control Call Flow Control Module Call Flow Toggle (%s) : %s Call Flow Toggle Control Call Flow Toggle: %s (%s) Call Flow manual toggle control - allows for two destinations to be chosen and provides a feature code		that toggles between the two destinations. Default Description Description for this Call Flow Toggle Control Forces to Normal Mode (Green/BLF off) Forces to Override Mode (Red/BLF on) Hook Time Conditions Module If a selection is made, this timecondition will be associated with the specified call flow toggle  featurecode. This means that if the Call Flow Feature code is set to override (Red/BLF on) then this time condition will always go to its True destination if the chosen association is to 'Force Time Condition True Destination' and it will always go to its False destination if the association is with the 'Force Time Condition False Destination'. When the associated Call Flow Control Feature code is in its Normal mode (Green/BLF off), then then this Time Condition will operate as normal based on the current time. The Destinations that are part of any Associated Call Flow Control Feature Code will have no affect on where a call will go if passing through this time condition. The only thing that is done when making an association is allowing the override state of a Call Flow Toggle to force this time condition to always follow one of its two destinations when that associated Call Flow Toggle is in its override (Red/BLF on) state. Linked to Time Condition %s - %s No Association Normal (Green/BLF off) Normal Flow (Green/BLF off) Optional Password Override (Red/BLF on) Override Flow (Red/BLF on) Please enter a valid numeric password, only numbers are allowed Recording for Normal Mode Recording for Override Mode This will change the current state for this Call Flow Toggle Control, or set the initial state when creating a new one. You can optionally include a password to authenticate before toggling the call flow. If left blank anyone can use the feature code and it will be un-protected Project-Id-Version: FreePBX v2.5
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2017-10-25 13:30-0700
PO-Revision-Date: 2014-07-21 16:49+0200
Last-Translator: Chavdar <chavdar_75@yahoo.com>
Language-Team: Bulgarian <http://git.freepbx.org/projects/freepbx/daynight/bg/>
Language: bg_BG
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=2; plural=n != 1;
X-Generator: Weblate 1.10-dev
X-Poedit-Language: Bulgarian
X-Poedit-Country: BULGARIA
X-Poedit-SourceCharset: utf-8
  - Приложи Времево Условие за Направление Не Съвпада  - Приложи Времево Условие за Направление Ако Съвпада Приложения По-подразбиране модула за Управление на Потока от Входящи Обаждания няма да превключи Времевите Условия като позволява асоцииране на специален код за превключване на потока входящи обаждания с времево условие откакто времевите условия имат собствен код за превключване започвайки от версия 2.9. Ако вече съществува такава асоциация (на обновена система), това няма да окаже влияние на Времевите Условия които са засегнати. Може да е полезно в два случая. Първо, да отмени Времево Условие без автоматично да ресетне вградените във Времевото Условие отмени. Втория случай е способността да асоциира едно превключване на поток входящи обаждания с няколко времеви условия като по този начин създава <b>главен превключвател</b> който може да се използва да отмени няколко възможни потока входящи обаждания чрез различни времеви условия. Управление на Входящи Обаждания Модул за Управление на Входящи Обаждания Превключване на Потока от Входящи Обаждания (%s) : %s Управление на Превключване на Потока от Входящи Обаждания Превключване на Потока от Входящи Обаждания: %s (%s) Ръчно управление на Входящи Обаждания - позволява за две направления да се избере и предостави специален код		който да превключи между двете направления. По-Подразбиране Описание Описание за това Управление на Превключване на Потока от Входящи Обаждания Принуждава към Нормален Режим (Зелено/BLF изкл) Принуждава към Режим на Отмяна (Червено/BLF вкл) Модул за превключване на Времеви Условия Ако е направен избор, това времево условие ще бъде асоциирано със специфичен специален код за превключване на потока входящи обаждания. Това означава че ако Специалния Код на Потока Входящи Обаждания е установен да отменя (Червено/BLF вкл) тогава това времево условие винаги ще отива към неговото Ако Съвпада направление ако избраната асоциация е 'Приложи Времево Условие за Направление Ако Съвпада' и винаги ще отива към неговото Не Съвпада направление ако избраната асоциация е 'Приложи Времево Условие за Направление ако Не Съвпада'. Когато асоциирания Специален Код за Управление на Потока Входящи Обаждания е в Нормален режим (Зелено/BLF изкл), тогава това Времево Условие ще работи като нормално базирано на текущото време. Направленията които са част от всеки Асоцииран Специален Код за Управление на Потока Входящи Обаждания няма да оказват ефект на това къде ще отиде обаждането ако отговаря на времевото условие. Когато се прави асоциация само се позволява да се отмени състоянието на Превключване на Потока Входящи Обаждания да принуди това времево условие винаги да следва едно от неговите две направления когато това асоциирано Превключване на Потока Входящи Обаждания е в състояние отмяна (Червено/BLF вкл). Свързан към Времева Група %s - %s Без Асоциация Нормален (Зелено/BLF изкл) Нормален Поток (Зелено/BLF изкл) Парола Отмяна (Червено/BLF вкл) Отменен Поток (Червено/BLF вкл) Моля въведете правилна цифрова парола, позволени са само цифри Запис за Нормален Режим Запис за Режим на Отмяна Това ще промени текущото състояние на Управление на Превключване на Потока от Входящи Обаждания, или ще установи първоначално състояние когато създавате нов. Допълнително можете да добавите парола за оторизиране преди превключване на потока от входящи обаждания. Ако е оставено празно всеки ще може да използва специалния код и ще е незащитено 