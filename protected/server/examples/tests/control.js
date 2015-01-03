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
	  .click('.roomA')
  },
  '5. Room B' : function(client) {
	client
	  .click('.roomB')
  },
  '6. Room C' : function(client) {
	client
	  .click('.roomC')
  },
  '7. Room D' : function(client) {
	client
	  .click('.roomD')
      .end();
  },
  
};
