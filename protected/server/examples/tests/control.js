/**
 * Sample automated test scenario for Nightwatch.js
 *
 * > it navigates to google.com and searches for nightwatch,
 *   verifying if the term 'The Night Watch' exists in the search results
 */

module.exports = {
  '1. Akses Webside' : function (client) {
    client
      .url('http://49.213.23.208')
      .waitForElementPresent('body', 1000);

  },
  '2. Login user Salah' : function(client) {
    client
      .setValue('input#LoginForm_username', 'user')
	  .setValue('input#LoginForm_password', 'password')
	  .click('input[type=submit]')
	  .pause(1000)
	  .assert.containsText('#LoginForm_password_em_','Incorrect username or password.')
	  .pause(1000)
  },
  '3. Login user admin' : function(client) {
	client
	  .clearValue('input#LoginForm_username')
	  .clearValue('input#LoginForm_password')
	  .setValue('input#LoginForm_username', 'admin')
	  .setValue('input#LoginForm_password', 'n0password')
	  .click('input[type=submit]')
	  .pause(1000)
	  .assert.containsText('.well','WELCOME')
	  .pause(1000)
  },
  '4. Room A' : function(client) {
	client
	  .click('.room')
	  .click('.roomA')
	  .pause(1000)
	  .assert.containsText('ul.breadcrumb li.active','Room A')
  },
  '5. Room B' : function(client) {
	client
	  .click('.room')
	  .click('.roomB')
	  .pause(1000)
	  .assert.containsText('ul.breadcrumb li.active','Room B')
  },
  '6. Room C' : function(client) {
	client
	  .click('.room')
	  .click('.roomC')
	  .pause(1000)
	  .assert.containsText('ul.breadcrumb li.active','Room C')
  },
  '7. Room D' : function(client) {
	client
	  .click('.room')
	  .click('.roomD')
	  .pause(1000)
	  .assert.containsText('ul.breadcrumb li.active','Room D')
      .end();
  },
  
};
