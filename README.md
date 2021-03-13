# Yii2 fullcalendar component

[![Latest Stable Version](https://poser.pugx.org/moreamazingnick/yii2-fullcalendar/v)](//packagist.org/packages/moreamazingnick/yii2-fullcalendar) 
[![Total Downloads](https://poser.pugx.org/moreamazingnick/yii2-fullcalendar/downloads)](//packagist.org/packages/moreamazingnick/yii2-fullcalendar) 
[![Latest Unstable Version](https://poser.pugx.org/moreamazingnick/yii2-fullcalendar/v/unstable)](//packagist.org/packages/moreamazingnick/yii2-fullcalendar) 
[![License](https://poser.pugx.org/moreamazingnick/yii2-fullcalendar/license)](//packagist.org/packages/moreamazingnick/yii2-fullcalendar)


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run

```
$ php composer.phar require moreamazingnick/yii2-fullcalendar "*"
```

or add

```
"moreamazingnick/yii2-fullcalendar": "*"
```

to the ```require``` section of your `composer.json` file.

## Usage

### Fullcalendar can be created as following, all options are optional, below is just an example of most options
```php
<?= moreamazingnick\fullcalendar\Fullcalendar::widget([
        'options'       => [
            'id'       => 'calendar',
        ],
        'clientOptions' => [
            'locale' => 'de-AT',
            'timeZone'=> 'local',

            //'initialView'=>'timeGridWeek',
            'firstDay' => 1,
            'weekNumbers' => true,
            'selectable'  => true,
            'eventTimeFormat' => [
                'hour' => '2-digit',
                'minute' => '2-digit',
                'omitZeroMinute' => false,
            ],
            'editable' => true,

   

        ],
        'events'        => Url::to(['calendar/events', 'id' => $uniqid]),
    ]);
?>
```


#### An event can have extendedProps, groupId, and display attribute, see https://fullcalendar.io/docs/event-object
```php
<?php
    new Event([
        'id'               => uniqid(),
        'title'            => 'Appointment #' . rand(1, 999),
        'start'            => '2016-03-17T12:30:00',
        'end'              => '2016-03-17T13:30:00',
        'editable'         => true,
        'startEditable'    => true,
        'durationEditable' => true,
        'extendedProps'=>['xyz'=>'123'],
        'groupId'=>1,
        'display'=>'auto'
    ])

?>
'id', 'groupId', 'display'
```
### Events can be added in three ways, PHP array, Javascript array or JSON feed

#### PHP array
```php
<?php
    $events = [
        new Event([
            'title' => 'Appointment #' . rand(1, 999),
            'start' => '2016-03-18T14:00:00',
        ]),
        // Everything editable
        new Event([
            'id'               => uniqid(),
            'title'            => 'Appointment #' . rand(1, 999),
            'start'            => '2016-03-17T12:30:00',
            'end'              => '2016-03-17T13:30:00',
            'editable'         => true,
            'startEditable'    => true,
            'durationEditable' => true,
        ]),
        // No overlap
        new Event([
            'id'               => uniqid(),
            'title'            => 'Appointment #' . rand(1, 999),
            'start'            => '2016-03-17T15:30:00',
            'end'              => '2016-03-17T19:30:00',
            'overlap'          => false, // Overlap is default true
            'editable'         => true,
            'startEditable'    => true,
            'durationEditable' => true,
        ]),
        // Only duration editable
        new Event([
            'id'               => uniqid(),
            'title'            => 'Appointment #' . rand(1, 999),
            'start'            => '2016-03-16T11:00:00',
            'end'              => '2016-03-16T11:30:00',
            'startEditable'    => false,
            'durationEditable' => true,
        ]),
        // Only start editable
        new Event([
            'id'               => uniqid(),
            'title'            => 'Appointment #' . rand(1, 999),
            'start'            => '2016-03-15T14:00:00',
            'end'              => '2016-03-15T15:30:00',
            'startEditable'    => true,
            'durationEditable' => false,
        ]),
    ];
?>

<?= moreamazingnick\fullcalendar\Fullcalendar::widget([
        'events'        => $events
    ]);
?>
```

#### Javascript array
```php
<?= moreamazingnick\fullcalendar\Fullcalendar::widget([
       'events'        => new JsExpression('[
            {
                "id":null,
                "title":"Appointment #776",
                "allDay":false,
                "start":"2016-03-18T14:00:00",
                "end":null,
                "url":null,
                "className":null,
                "editable":false,
                "startEditable":false,
                "durationEditable":false,
                "rendering":null,
                "overlap":true,
                "constraint":null,
                "source":null,
                "color":null,
                "backgroundColor":"grey",
                "borderColor":"black",
                "textColor":null
            },
            {
                "id":"56e74da126014",
                "title":"Appointment #928",
                "allDay":false,
                "start":"2016-03-17T12:30:00",
                "end":"2016-03-17T13:30:00",
                "url":null,
                "className":null,
                "editable":true,
                "startEditable":true,
                "durationEditable":true,
                "rendering":null,
                "overlap":true,
                "constraint":null,
                "source":null,
                "color":null,
                "backgroundColor":"grey",
                "borderColor":"black",
                "textColor":null
            },
            {
                "id":"56e74da126050",
                "title":"Appointment #197",
                "allDay":false,
                "start":"2016-03-17T15:30:00",
                "end":"2016-03-17T19:30:00",
                "url":null,
                "className":null,
                "editable":true,
                "startEditable":true,
                "durationEditable":true,
                "rendering":null,
                "overlap":false,
                "constraint":null,
                "source":null,
                "color":null,
                "backgroundColor":"grey",
                "borderColor":"black",
                "textColor":null
            },
            {
                "id":"56e74da126080",
                "title":"Appointment #537",
                "allDay":false,
                "start":"2016-03-16T11:00:00",
                "end":"2016-03-16T11:30:00",
                "url":null,
                "className":null,
                "editable":false,
                "startEditable":false,
                "durationEditable":true,
                "rendering":null,
                "overlap":true,
                "constraint":null,
                "source":null,
                "color":null,
                "backgroundColor":"grey",
                "borderColor":"black",
                "textColor":null
            },
            {
                "id":"56e74da1260a7",
                "title":"Appointment #465",
                "allDay":false,
                "start":"2016-03-15T14:00:00",
                "end":"2016-03-15T15:30:00",
                "url":null,
                "className":null,
                "editable":false,
                "startEditable":true,
                "durationEditable":false,
                "rendering":null,
                "overlap":true,
                "constraint":null,
                "source":null,
                "color":null,
                "backgroundColor":"grey",
                "borderColor":"black",
                "textColor":null
            },
        ]'),
    ]);
?>
```

#### JSON feed
```php
<?= moreamazingnick\fullcalendar\Fullcalendar::widget([
        'events'        => Url::to(['calendar/events', 'id' => $uniqid]),
    ]);
?>
```

Your controller action would then return an array as following
```php
    /**
	 * @param $id
	 * @param $start
	 * @param $end
	 * @return array
	 */
	public function actionEvents($id, $start, $end)
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		return [
			// minimum
			new Event([
				'title' => 'Appointment #' . rand(1, 999),
				'start' => '2016-03-18T14:00:00',
			]),
			// Everything editable
			new Event([
				'id'               => uniqid(),
				'title'            => 'Appointment #' . rand(1, 999),
				'start'            => '2016-03-17T12:30:00',
				'end'              => '2016-03-17T13:30:00',
				'editable'         => true,
				'startEditable'    => true,
				'durationEditable' => true,
			]),
			// No overlap
			new Event([
				'id'               => uniqid(),
				'title'            => 'Appointment #' . rand(1, 999),
				'start'            => '2016-03-17T15:30:00',
				'end'              => '2016-03-17T19:30:00',
				'overlap'          => false, // Overlap is default true
				'editable'         => true,
				'startEditable'    => true,
				'durationEditable' => true,
			]),
			// Only duration editable
			new Event([
				'id'               => uniqid(),
				'title'            => 'Appointment #' . rand(1, 999),
				'start'            => '2016-03-16T11:00:00',
				'end'              => '2016-03-16T11:30:00',
				'startEditable'    => false,
				'durationEditable' => true,
			]),
			// Only start editable
			new Event([
				'id'               => uniqid(),
				'title'            => 'Appointment #' . rand(1, 999),
				'start'            => '2016-03-15T14:00:00',
				'end'              => '2016-03-15T15:30:00',
				'startEditable'    => true,
				'durationEditable' => false,
			]),
		];
	}
```

### Callbacks

Callbacks have to be wrapped in a JsExpression() object. For example if you want to use the eventResize you would add the following to the fullcalendar clientOptions
```php
<?= moreamazingnick\fullcalendar\Fullcalendar::widget([
        'clientOptions' => [
            //modify eventcontainer
            'eventDidMount' => new JsExpression("
                function (info) {
                        let p = document.createElement('span');
                        p.innerHTML='mytest';
                        p.className = 'mytest';
                        info.el.append(p)
                }
            "),
            'eventAdd'=>new JsExpression("
                function (info) {
                    console.log(info);
                }
            "),
            'loading' =>new JsExpression("
                function(bool) {
                     if(bool){
                          doSomething();
                     }else{
                         doSomethingElse();
                     }
                }
            "),
            // select an empty time slot and do something, like create an event
            'select' => new JsExpression("
                 function(arg) {
                     Event = {
                         title: 'Slot',
                         start: arg.start,
                         end: arg.end,
                         editable: true,
                         startEditable: true,
                         durationEditable: true,
                         allDay: arg.allDay,
                     };
                     postevent=JSON.parse(JSON.stringify({Event}));
                         jQuery.ajax({
                             type: 'POST',
                             url: '" . Url::to(['yourcontroller/create-event']) . "',
                             data: postevent,
                             success: function(response){
                                 console.log('create event select');
                                 if(response){
                                     calendar.addEvent(response)
                                 }else{
                                     alert('Could not create event!');
                                 }
                                 calendar.unselect() 
                            },
                            error: function(){
                                alert('Could not create event!');
                                calendar.unselect()
                            },
                        });
                 }
            "),
            // moves event from one timeslot to another
            'eventDrop' => new JsExpression(" 
                function(eventDropInfo) {
                Event=eventDropInfo.event;
                postdata=JSON.parse(JSON.stringify({Event}));
                jQuery.ajax({
                    type: 'POST',
                    url: '" . Url::to(['yourcontroller/update-event']) . "',
                    data: postdata,
                    success: function(response){
                    console.log('create event drop');
                        if(response){

                        }else{
                            alert('Could not alter event!');
                            eventDropInfo.revert();
                        }
                        console.log(response); 
                    },
                    error: function(){
                        alert('Could not alter event!')
                        eventDropInfo.revert();
                    },

                });

            }"),
            // You can use the same implementation as in eventDrop
            'eventResize' => new JsExpression("
                function(eventResizeInfo) {
            "),
            //OnClick event, for example you can open a modal window or fetch more details
            'eventClick'=>new JsExpression("
                function (e) {
                }
            "),       
        ],
    ]);
?>
```
