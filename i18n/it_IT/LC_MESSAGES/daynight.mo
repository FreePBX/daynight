��    ;      �  O   �        )   	  (   3     \     b     i     q     u     �  *   �  z  �  	   5	     ?	     Q	     j	     �	     �	  #   �	     �	  �   �	     �
     �
     �
     �
  -   �
  ?   �
  >   %  $   d     �  %   �  $   �     �    �           -  {   <  �   �     :     I     `     |          �     �  ?   �       &     (   E     n     �     �     �     �  �   �  w   M     �  �   �  Q   }  %   �  �  �  ,   �  +   �     (     5     B  
   I     T     h  ,   u  L  �     �       #     ,   C  3   p      �  <   �  "     �   %     �     �     �     �  G   �  _   B  V   �  *   �     $  /   4  0   d  *   �  �  �  +   W$     �$  �   �$  �   E%     �%     �%  #   &     3&     6&     I&  '   g&  G   �&  +   �&  8   '  @   <'  &   }'  '   �'     �'     �'     �'  �   �'  �   �(  &   f)  �   �)  c   U*  .   �*                         *       /   9            2   #   :   8              "      (                3          7           '                           6   +   -       .           !                $   1       	   )   &   ,   
                 0      5      %                       4   ;     - Force Time Condition False Destination  - Force Time Condition True Destination : Add : Edit Actions Add Add Callflow Applications Are you sure you want to delete this flow? By default, the Call Flow Control module will not hook Time Conditions allowing one to associate a call flow toggle feauture code with a time condition since time conditions have their own feature code as of version 2.9. If there is already an associaiton configured (on an upgraded system), this will have no affect for the Time Conditions that are effected. Setting this to true reverts the 2.8 and prior behavior by allowing for the use of a call flow toggle to be associated with a time conditon. This can be useful for two scenarios. First, to override a Time Condition without the automatic resetting that occurs with the built in Time Condition overrides. The second use is the ability to associate a single call flow toggle with multiple time conditions thus creating a <b>master switch</b> that can be used to override several possible call flows through different time conditions. Call Flow Call Flow Control Call Flow Control Module Call Flow Toggle (%s) : %s Call Flow Toggle Associate with Call Flow Toggle Control Call Flow Toggle Feature Code Index Call Flow Toggle: %s (%s) Call Flow manual toggle control - allows for two destinations to be chosen and provides a feature code		that toggles between the two destinations. Current Mode Default Delete Description Description for this Call Flow Toggle Control Destination to use when set to Normal Flow (Green/BLF off) mode Destination to use when set to Override Flow (Red/BLF on) mode ERROR: failed to alter primary keys  Feature Code Forces to Normal Mode (Green/BLF off) Forces to Override Mode (Red/BLF on) Hook Time Conditions Module If a selection is made, this timecondition will be associated with the specified call flow toggle  featurecode. This means that if the Call Flow Feature code is set to override (Red/BLF on) then this time condition will always go to its True destination if the chosen association is to 'Force Time Condition True Destination' and it will always go to its False destination if the association is with the 'Force Time Condition False Destination'. When the associated Call Flow Control Feature code is in its Normal mode (Green/BLF off), then then this Time Condition will operate as normal based on the current time. The Destinations that are part of any Associated Call Flow Control Feature Code will have no affect on where a call will go if passing through this time condition. The only thing that is done when making an association is allowing the override state of a Call Flow Toggle to force this time condition to always follow one of its two destinations when that associated Call Flow Toggle is in its override (Red/BLF on) state. Linked to Time Condition %s - %s List Callflows Message to be played in normal mode (Green/BLF off).<br>To add additional recordings use the "System Recordings" MENU above Message to be played in override mode (Red/BLF on).<br>To add additional recordings use the "System Recordings" MENU to the above No Association Normal (Green/BLF off) Normal Flow (Green/BLF off) OK Optional Password Override (Red/BLF on) Override Flow (Red/BLF on) Please enter a valid numeric password, only numbers are allowed Please set the Current Mode Please set the Normal Flow destination Please set the Override Flow destination Recording for Normal Mode Recording for Override Mode Reset State Submit There are a total of %s Feature code objects, %s, each can control a call flow and be toggled using the call flow toggle feature code plus the index. This will change the current state for this Call Flow Toggle Control, or set the initial state when creating a new one. Time Condition Reference You can optionally include a password to authenticate before toggling the call flow. If left blank anyone can use the feature code and it will be un-protected You have reached the maximum limit for flow controls. Delete one to add a new one changing primary keys to all fields.. Project-Id-Version: 2.5
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2017-10-25 16:22-0400
PO-Revision-Date: 2018-05-29 09:33+0000
Last-Translator: Stell0 <stefano.fancello@nethesis.it>
Language-Team: Italian <http://*/projects/freepbx/daynight/it/>
Language: it_IT
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=2; plural=n != 1;
X-Generator: Weblate 2.19.1
X-Poedit-Language: Italian
X-Poedit-Country: ITALY
  - forza tempo condizione falsa destinazione  - forza tempo condizione vera destinazione : aggiungere : modificare Azioni Aggiungere Aggiungere Callflow Applicazioni Sei sicuro di voler eliminare questo flusso? Per impostazione predefinita, il modulo Call Flow Control non associa condizioni temporali che consentono di associare un codice di attivazione / disattivazione del flusso di chiamata con una condizione temporale poiché le condizioni temporali hanno il proprio codice funzione a partire dalla versione 2.9. Se esiste già un'associazione configurata (su un sistema aggiornato), ciò non avrà alcun effetto sulle condizioni di tempo che si verificano. Impostando su true si ripristina il comportamento 2.8 e precedente consentendo l'uso di un interruttore di flusso di chiamata da associare a una condizione temporale. Questo può essere utile per due scenari. Innanzitutto, per sovrascrivere una condizione temporale senza il ripristino automatico che si verifica con le sovrascritture di condizione temporale incorporate. Il secondo utilizzo è la possibilità di associare un singolo interruttore di chiamata con più condizioni temporali creando così un <b> 1master switch </b> 2 che può essere utilizzato per ignorare più possibili flussi di chiamata attraverso diverse condizioni temporali. flusso di chiamata Controllo flusso di chiamata Controllo moduli flusso di chiamata Attiva / disattiva flusso chiamate (%s1):%s2 Flusso di chiamata Attiva / disattiva associato con Controllo del flusso di chiamata flusso di chiamata attiva l'indice del codice caratteristica Interruttore di chiamata:%s1 (%s2) Controllo di commutazione manuale di Call Flow: consente di scegliere due destinazioni e fornisce un codice di funzionalità che alterna tra le due destinazioni. Modalità corrente Predefinito Elimina Descrizione Descrizione per questo controllo di commutazione del flusso di chiamata Destinazione da utilizzare quando è impostata la modalità Flusso normale (verde / BLF spento) Destinazione da utilizzare quando impostato su Sovrascrivi flusso (Rosso / BLF attivo) ERROE: alterazione chiavi primarie fallito Codice funzione Forza in modalità normale (verde / BLF spento) Forza la modalità Override (rosso / BLF attivo) Modulo di condizioni del tempo di aggancio Se viene effettuata una selezione, questo tempo sarà associato al flusso di chiamata specificato. Ciò significa che se il codice funzione Flusso chiamate è impostato su Override (Rosso / BLF attivo), questa condizione temporale andrà sempre alla sua destinazione True se l'associazione scelta è su 'Force Time Condition True Destination' e andrà sempre al suo Destinazione errata se l'associazione è con la 'Destinazione falso Condizione False Destinazione'. Quando il codice della funzione di controllo del flusso chiamate associato è in modalità Normale (verde / BLF disattivato), allora questa condizione temporale funzionerà normalmente in base all'ora corrente. Le destinazioni che fanno parte di qualsiasi codice funzione di controllo del flusso chiamate associato non avranno alcun effetto sul luogo in cui una chiamata andrà se passa attraverso questa condizione temporale. L'unica cosa che viene fatta quando si crea un'associazione è quella di consentire lo stato di override di un flusso di chiamate Toggle per forzare questa condizione temporale a seguire sempre una delle sue due destinazioni quando quello associato è attivo (rosso / BLF attivo) . Collegato alla Condizione Temporale %s - %s Elenco flussi di chiamata Messaggio da riprodurre in modalità normale (verde / BLF disattivato). <br> Per aggiungere ulteriori registrazioni utilizzare il menu "Registrazioni di sistema" sopra Messaggio da riprodurre in modalità override (rosso / BLF attivo). <br> Per aggiungere ulteriori registrazioni utilizzare il MENU "System Recordings" su Nessuna Associazione Normale (Verde/BLF spento) Flusso normale (verde / BLF spento) OK Password Opzionale Override (rosso / BLF attivo) Sovrascrivi flusso (rosso / BLF attivo) Prego immettere una password numerica valida, solo numero sono permessi Si prega di impostare la modalità corrente Si prega di impostare la destinazione del flusso normale Si prega di impostare la destinazione di sostituzione del flusso Registrazione per la modalità normale Registrazione per la modalità Override Elimina Stato Sottoscrivo Sono presenti un totale di %s1 oggetti codice funzione, %s2, ciascuno in grado di controllare un flusso di chiamate e di essere commutato utilizzando il codice di attivazione / disattivazione del flusso di chiamate più l'indice. Ciò cambierà lo stato corrente per questo controllo di commutazione del flusso di chiamata, o imposterà lo stato iniziale quando ne creerai uno nuovo. Riferimento delle condizioni temporali È possibile includere facoltativamente una password per l'autenticazione prima di attivare il flusso chiamate. Se lasciato in bianco, chiunque può utilizzare il codice funzione e non sarà protetto Hai raggiunto il limite massimo per i controlli di flusso. Cancellane uno per aggiungerne uno nuovo cambiamento chiavi primarie su tutti i campi.. 