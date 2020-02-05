<script>
  var token;
  var pagee;
  var user;

  window.fbAsyncInit = function() {
    FB.init({
      appId            : '483041449178392',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v4.0'
    });
  };(function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  function subscribeApp(page_id, page_access_token) {
    console.log('Subscribing page to app! ' + page_id);
    FB.api(
      '/' + page_id + '/subscribed_apps',
      'post',
      {access_token: page_access_token, subscribed_fields: ['feed']},
      function(response) {
        console.log('Successfully subscribed page', response);
        leads(page_id, page_access_token);
        //graph.facebook.com/page_id?fields=id,name,leadgen_forms{id, name};
      }
    );
  }

  function leadsListing(page_id, page_access_token, lead_id) {
    FB.api('/' + lead_id + '?fields=leads{field_data,created_time}' +
      '&access_token=' + page_access_token,
      function(response) {

        console.log(response);
        var leads = response.leads.data;

        var ul = document.getElementById('answers');
        console.log('tam ', leads.length);
        for (var i = 0, len = leads.length; i < len; i++) {
          var answers = leads[i].field_data;
          var date = leads[i].created_time;
          var tmpAns = date + ' / ';

          console.log(i, ' tam2 ', answers.length);
          for (var j = 0, len = answers.length; j < len; j++) {
            var answer = answers[j];

            tmpAns = tmpAns + answer.values + ' / ';
          }
          
          var li = document.createElement('li');
          var a = document.createElement('a');
          a.href = "#";
          //a.onclick = leadsListing.bind(this, page_id, page_access_token, lead.id);
          a.innerHTML = tmpAns;
          console.log('> ' + tmpAns);
          li.appendChild(a);
          ul.appendChild(li);
        }
      });
  }

  function leads(page_id, page_access_token){
    FB.api('/' + page_id + '?fields=id,name,leadgen_forms{id, name}' +
      '&access_token=' + page_access_token,
      function(response) {
        console.log('respuesta ');
        console.log(response);

        var leads = response.leadgen_forms.data;

        var ul = document.getElementById('leads');
        for (var i = 0, len = leads.length; i < len; i++) {
          var lead = leads[i];
          var li = document.createElement('li');
          var a = document.createElement('a');
          a.href = "#";
          a.onclick = leadsListing.bind(this, page_id, page_access_token, lead.id);
          a.innerHTML = lead.id + ' - ' + lead.name;
          console.log('> ' + lead.name + ' ' + lead.id);
          li.appendChild(a);
          ul.appendChild(li);
        }
      },
      {scope: ['manage_pages,leads_retrieval']});
  }
    
  // Only works after `FB.init` is called
  function myFacebookLogin() {
    FB.login(function(response){
      FB.api('/me', function(response) {
        console.log('logeado como ', response.name);
        user = response.id;
        FB.api('/me/accounts', function(response) {
          var pages = response.data;
          var ul = document.getElementById('list');
          for (var i = 0, len = pages.length; i < len; i++) {
            var page = pages[i];
            token = page.access_token;
            pagee = page.id;
            var li = document.createElement('li');
            var a = document.createElement('a');
            a.href = "#";
            a.onclick = subscribeApp.bind(this, page.id, page.access_token);
            a.innerHTML = page.name;
            li.appendChild(a);
            console.log('Id pagina: ', page.id , ' - ', page.name);
            console.log('Token pagina: ', page.access_token);
            ul.appendChild(li);
          }
        });
      });
    }, {scope: 'manage_pages,leads_retrieval'});
  }

  function logout(){
    console.log('test', token);
    FB.api('/me/permissions?access_token=' + token,'DELETE',function(response){
    console.log(response); //gives true on app delete success 
    });
  }

  function connect(){
    console.log('page: ', pagee);
    console.log('token: ', token);
    console.log('user: ', user);
    var payload = {
      access_token: token,
      subscribed_fields: ['leadgen', 'leadgen_fat']
    };

    FB.api('/' + pagee + '/subscribed_apps', 'post', payload, function (response) {
      if (response.success === true) {
        console.log('correcto conect', response);
      } else {
        console.log('incorrecto conect');
      }
    });
  }

  function disconnect(){
    console.log('page: ', pagee);
    console.log('token: ', token);
    console.log('user: ', user);
    FB.api('/' + pagee + '/subscribed_apps', 'delete', { access_token: token }, function (response) {
      if (response.success === true) {
        //pagee.data.is_webhooks_subscribed = false;
        console.log('correcto disconect');
      } else {
        console.log('incorrecto disconect');
      }
    });
  }
</script>

<fb:login-button scope="public_profile" onlogin="myFacebookLogin();">
</fb:login-button>

<input type="button" onclick="connect();" value="Conectar">
<input type="button" onclick="disconnect();" value="Desconectar">


<ul id="list"></ul>
<ul id="leads"></ul>
<ul id="answers"></ul>