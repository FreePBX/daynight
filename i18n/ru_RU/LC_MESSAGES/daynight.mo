��    7      �  I   �      �  )   �  (   �          
                    *  *   7  z  b  	   �     �     �     	     -	     M	  #   f	     �	     �	     �	     �	     �	  -   �	  ?   �	  >   :
     y
  %   �
  $   �
     �
    �
      �       {   ,  �   �     *     9     P     l     ~     �  ?   �     �  &     (   2     [     u     �     �     �  �   �  w   :     �  �   �  Q   j  �  �  }   �  x   3     �     �     �     �     �       ^   +  �  �     y  E   �  ,   �  ]     Q   c  U   �  {      ]   �      �      �      !     &!  A   7!  �   y!  �   "     �"  g   �"  Q   #  >   b#  w  �#  F   +  (   `+  �   �+  �   j,     J-  1   f-  H   �-  %   �-  C   .  :   K.  o   �.  .   �.  T   %/  k   z/  )   �/  )   0  
   :0     E0     R0  <  i0  �   �1  3   �2    �2  �   R4                   -   0                    %               1      /             2   "   (      #          5      $      7   	               3                 
           !                *           &      4      6   )      .          '      ,       +               - Force Time Condition False Destination  - Force Time Condition True Destination : Add : Edit Actions Add Add Callflow Applications Are you sure you want to delete this flow? By default, the Call Flow Control module will not hook Time Conditions allowing one to associate a call flow toggle feauture code with a time condition since time conditions have their own feature code as of version 2.9. If there is already an associaiton configured (on an upgraded system), this will have no affect for the Time Conditions that are effected. Setting this to true reverts the 2.8 and prior behavior by allowing for the use of a call flow toggle to be associated with a time conditon. This can be useful for two scenarios. First, to override a Time Condition without the automatic resetting that occurs with the built in Time Condition overrides. The second use is the ability to associate a single call flow toggle with multiple time conditions thus creating a <b>master switch</b> that can be used to override several possible call flows through different time conditions. Call Flow Call Flow Control Call Flow Control Module Call Flow Toggle (%s) : %s Call Flow Toggle Associate with Call Flow Toggle Control Call Flow Toggle Feature Code Index Call Flow Toggle: %s (%s) Current Mode Default Delete Description Description for this Call Flow Toggle Control Destination to use when set to Normal Flow (Green/BLF off) mode Destination to use when set to Override Flow (Red/BLF on) mode Feature Code Forces to Normal Mode (Green/BLF off) Forces to Override Mode (Red/BLF on) Hook Time Conditions Module If a selection is made, this timecondition will be associated with the specified call flow toggle  featurecode. This means that if the Call Flow Feature code is set to override (Red/BLF on) then this time condition will always go to its True destination if the chosen association is to 'Force Time Condition True Destination' and it will always go to its False destination if the association is with the 'Force Time Condition False Destination'. When the associated Call Flow Control Feature code is in its Normal mode (Green/BLF off), then then this Time Condition will operate as normal based on the current time. The Destinations that are part of any Associated Call Flow Control Feature Code will have no affect on where a call will go if passing through this time condition. The only thing that is done when making an association is allowing the override state of a Call Flow Toggle to force this time condition to always follow one of its two destinations when that associated Call Flow Toggle is in its override (Red/BLF on) state. Linked to Time Condition %s - %s List Callflows Message to be played in normal mode (Green/BLF off).<br>To add additional recordings use the "System Recordings" MENU above Message to be played in override mode (Red/BLF on).<br>To add additional recordings use the "System Recordings" MENU to the above No Association Normal (Green/BLF off) Normal Flow (Green/BLF off) Optional Password Override (Red/BLF on) Override Flow (Red/BLF on) Please enter a valid numeric password, only numbers are allowed Please set the Current Mode Please set the Normal Flow destination Please set the Override Flow destination Recording for Normal Mode Recording for Override Mode Reset State Submit There are a total of %s Feature code objects, %s, each can control a call flow and be toggled using the call flow toggle feature code plus the index. This will change the current state for this Call Flow Toggle Control, or set the initial state when creating a new one. Time Condition Reference You can optionally include a password to authenticate before toggling the call flow. If left blank anyone can use the feature code and it will be un-protected You have reached the maximum limit for flow controls. Delete one to add a new one Project-Id-Version: 1.3.1
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2022-05-23 07:41+0000
PO-Revision-Date: 2016-02-05 18:20+0200
Last-Translator: ded <ceo@postmet.com>
Language-Team: Russian <http://weblate.freepbx.org/projects/freepbx/daynight/ru_RU/>
Language: ru_RU
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=3; plural=n%10==1 && n%100!=11 ? 0 : n%10>=2 && n%10<=4 && (n%100<10 || n%100>=20) ? 1 : 2;
X-Generator: Weblate 2.2-dev
  - Форсировать назначение которое не попадает под правило по времени  - Форсировать назначение которое попадает под правило по времени :Добавить :Редактировать Действия Добавить Добавить Callflow Приложения Вы уверены,что хотите удалить  данный поток  вызова? По умолчанию модуль управления всеми вызовами не проверяет Правила по времени, но позволяет связать ручное переключение с правилами по времени ввиду того что начиная с версии 2.9 Правила по времени имеют свой собственный сервисный код. Если такое связывание уже создано (например на предыдущей версии при обновлении системы), то никакого дополнительного действия для Правил по времени для выполнения той же задачи предпринимать не нужно. Установка опции во 'Включено' (true) возвращает такое поведение версии 2.8 к сценарию включения этой возможности в предыдущих версиях, включая связанное с этим Правило  по времени. Это можно использовать двумя разными вариантами. По первому - подавлять включение Правила по времени, которое происходило бы по встроенному в Правила по времени сценарию автоматически. Второй - использовать возможность позвонить и набрать сервисный код, который будет как-бы <b>главным переключателем</b>, включающим одно или несколько Правил по времени. Поток  вызова Общее управление прохождения вызовов Модуль контроля вызовов Переключатель состояния прохождения вызовов (%s) : %s Связать переключение прохождения вызовов  с Управление переключением прохождения вызовов Индекс сервисного кода  функции "Переключение прохождения вызовов" Переключатель состояния прохождения вызовов (%s) : %s Текущий режим По умолчанию Удалить Описание Описание для этого режима День/Ночь Какой внутренний номер использовать когда установлен Normal Flow (Green/BLF off) режим Какой внутренний номер использовать когда установлен Override Flow (Red/BLF on) режим Сервисный код Форсировать переход в нормальный режим (Green/BLF выключено) Форсировать режим подавления (Red/BLF включено) Вызвать модуль условий по времени Если выбрано, то это правило по времени будет связано с соответствующим сервисным кодом, переключающим состояние прохождения вызовов. Это означает, что если сервисный код переключения вызовов установлен в режим подавления (Red/BLF on), то по текущему правилу по времени вызов пойдёт на конечное назначение, если выбрана опция Форсировать конечное назначения правила по времени. И по этому же правилу вызов пойдёт в то назначение, которое указано для 'Если вызов не попадает в текущее правило  по времени'. Если сервисный код, связанный с переключением прохождения вызовов будет в состоянии Нормальный режим (Green/BLF выключено), то правило по времени будет срабатывать согласно текущему времени на сервере. Если вызов попадает под действие правила по времени, то не имеет значения куда в конечном счёте он будет направлен. То есть назначения, связанные с сервисным кодом переключения вызовов будут подавлять все другие, связанные с правилами по времени, руководствуясь состоянием этого переключения, когда оно отображается в положении (Red/BLF включено). Присоединено к правилу по времени %s - %s Список потоков вызова Сообщение,воспроизводимое в обычном режиме(Green/BLF off).<br>Для добавления дополнительных записей  используйте "System Recordings" Меню Сообщение, воспроизводимое в обычном режиме (Red/BLF on).<br>Для добавления дополнительных записей  используйте "System Recordings" Меню Нет связывания Нормальный (Green/BLF выключен) Нормальное прохождение (Green/BLF выключен) Пароль (опционально) Подавление правил Override (Red/BLF включен) Подавлять правила (Red/BLF включен) Введите разрешённый цифровой пароль, разрешены только цифры Установите текущий режим Пожалуйста установите направление для  Normal Flow Пожалуйста установите направление для обходного сценария Запись для режима День Запись для режима Ночь Сброс Статус Подтвердить Всего %s объектов сервисных кодов, %s, каждый из которых может контролировать прохождение вызова, и может быть переключён, используя функцию Переключение прохождения вызова. Эта опция изменяет текущее состояние для сценария прохождения звонков или выставляет начальные условия при создании нового сценария. Ссылка на временное условие Опционально, можно добавить пароль для аутентификации прежде чем переключать режим день/ночь. Если оставить пустым - любой, кто узнает сервисный код переключения может воспользоваться, и это никак не защищено Вы достигли максимального предела количества контрольных точек прохождения вызова. Удалите одну  для создания новой. 