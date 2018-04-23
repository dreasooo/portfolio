  (function($){

  		var app = {
            
            'contactForm':{
            	'formAlert':$('#myAlert'),
            	'init':function(){
            		
            		var $this = this;
            		var contactForm = $('#usrform');
            		
            		contactForm.on('submit', function(event){

            			var $form = $(this);
            			event.preventDefault();
            			$this._send($form);
            		});

            		this.formAlert.find('.close').on('click', function(event){
            			event.preventDefault();
			            $this._hideAlert();
            		});
            		   
            	},
            	/* send contact message */
            	'_send':function(formElem){

            		var $this = this;
            		$.ajax({
			                url: formElem.attr('action'),
			                type: 'post',
			                data: formElem.serialize(),
		              }).done(function() {
		              		$this._showAlert();
			                formElem.get(0).reset();
		              });
            	},
            	/* show alert notification */
            	'_showAlert':function(){
            			this.formAlert.show();
            	},
            	/* hide alert notification*/
            	'_hideAlert':function(){
            		this.formAlert.alert("close");
            	}

            },
			'init':function(){
				app.contactForm.init();
			},
  		};

  		app.init();
  })(jQuery)