(function(window) {
    // Create a namespace for your tracker
    const appTracker = window.appTracker || {};
  
    class eskimiTracker {
        static trackingEndpoint = 'https://example.com/track';
        static campaignId;
        static campaignId;
        static campaignId;
        static campaignId;
        static campaignId;

        constructor() {
          
          this.campaignId='';
          this.campaignId='';
          this.campaignId='';
          this.campaignId='';
          this.campaignId='';

        }
        config(options) {
          // Update the configuration options if needed
          // For example: this.trackingEndpoint = options.endpoint;
          var defaultOptions = {
            eventName: eventName,
            eventData: eventData
          }
        }
      
        track(eventName, eventData) {
          // Create an HTTP request to send the tracking data to the server
          const xhr = new XMLHttpRequest();
          xhr.open('POST', this.trackingEndpoint, true);
          xhr.setRequestHeader('Content-Type', 'application/json');
      
          // Prepare the data to be sent
          const data = {
            eventName: eventName,
            eventData: eventData
          };
      
          // Convert the data to JSON and send it
          xhr.send(JSON.stringify(data));
        }
      }
    
  
     //tracker.track('buttonClicked', { buttonId: 'myButton', timestamp: Date.now() });
      
    // Attach the tracker to the global object
    window.appTracker =  new MyTracker();

  })(window);
  