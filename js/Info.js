Ext.require('Ext.chart.*');
Ext.require(['Ext.Window', 'Ext.fx.target.Sprite', 'Ext.layout.container.Fit']);
Ext.require(['Ext.data.*', 'Ext.util.Date']);

Ext.onReady(function () {

	Ext.regModel('Wine', {
	    fields: [
	             {name: 'CharacteristicKind', type: 'string'},
	             {name: 'CharacteristicValue', type: 'int'},
	             {name: 'CharacteristicKeyword', type: 'string'},
	             {name: 'CharacteristicDescription', type: 'string'},
	             {name: 'AromaKind', type: 'string'},
	             {name: 'AromaValue', type: 'int'},
	             {name: 'AromaKeyword', type: 'string'},
	             {name: 'AromaDescription', type: 'string'},
	             {name: 'SensationKind', type: 'string'},
	             {name: 'SensationValue', type: 'int'},
	             {name: 'SensationKeyword', type: 'string'},
	             {name: 'SensationDescription', type: 'string'},
	             {name: 'FlavorKind', type: 'string'},
	             {name: 'FlavorValue', type: 'int'},
	             {name: 'FlavorKeyword', type: 'string'},
	             {name: 'FlavorDescription', type: 'string'}
	            ]
	});
 
var wines = {
      PinotNoir:[new Wine({
                         indexId: 0,
                         CharacteristicKind: "Characteristic",
                         CharacteristicValue: 25,
                         CharacteristicKeyword: "Powerful",
                         CharacteristicDescription: "Intense flavors and aromas exude from this firm wine",
                         AromaKind: "Aroma",
                         AromaValue: 40,
                         AromaKeyword: "Toasted Oak",
                         AromaDescription: "Rich aromas of cherries, plums, tobacco, licorice, and oak",
                         SensationKind: "Sensation",
                         SensationValue: 15,
                         SensationKeyword: "Smooth",
                         SensationDescription: "Very chewy with a long lingering finish",
                         FlavorKind: "Flavor",
                         FlavorValue: 20,
                         FlavorKeyword: "Blackberries",
                         FlavorDescription: "Abundant flavors of blackberry jam and plums with firm tannins"
              })],
 		Merlot:[new Wine({
			   indexId: 1,
			   CharacteristicKind: "Characteristic",
			   CharacteristicValue: 20,
			   CharacteristicKeyword: "Tannin",
			   CharacteristicDescription: "",
			   AromaKind: "Aroma",
			   AromaValue: 30,
			   AromaKeyword: "Oak",
			   AromaDescription: "",
			   SensationKind: "Sensation",
			   SensationValue: 30,
			   SensationKeyword: "Velvet",
			   SensationDescription: "",
			   FlavorKind: "Flavor",
			   FlavorValue: 20,
			   FlavorKeyword: "Berry",
			   FlavorDescription: ""
		})],
		Resling: [new Wine({
			   indexId: 2,
			   CharacteristicKind: "Characteristic",
			   CharacteristicValue: 15,
			   CharacteristicKeyword: "Balanced",
			   CharacteristicDescription: "",
			   AromaKind: "Aroma",
			   AromaValue: 20,
			   AromaKeyword: "Floral",
			   AromaDescription: "",
			   SensationKind: "Sensation",
			   SensationValue: 40,
			   SensationKeyword: "Crisp",
			   SensationDescription: "",
			   FlavorKind: "Flavor",
			   FlavorValue: 25,
			   FlavorKeyword: "Lime",
			   FlavorDescription: ""
		})],
		Shiraz: [new Wine({
			   indexId: 3,
			   CharacteristicKind: "Characteristic",
			   CharacteristicValue: 25,
			   CharacteristicKeyword: "Rich",
			   CharacteristicDescription: "Rich",
			   AromaKind: "Aroma",
			   AromaValue: 25,
			   AromaKeyword: "Oak",
			   AromaDescription: "Oak",
			   SensationKind: "Sensation",
			   SensationValue: 35,
			   SensationKeyword: "Pepper",
			   SensationDescription: "Pepper",
			   FlavorKind: "Flavor",
			   FlavorValue: 15,
			   FlavorKeyword: "Sweet",
			   FlavorDescription: "Sweet"
		})]
	 };
	
 	
	 var graphFields = ['CharacteristicValue','AromaValue','SensationValue','FlavorValue'];

	 
	 function generateData(wine){
    	 currentWine = wine;
    	 return wines[wine];
     }

     var store1 = new Ext.data.JsonStore({
	     model: "Wine",
	     data: generateData("PinotNoir")
	 });
     
     var chart = Ext.create('Ext.chart.Chart', {
        width: 167,
        height: 358,
        hidden: false,
        renderTo: Ext.get("infographic"),
        id: 'chartCmp',
        xtype: 'chart',
        animate: true,
        store: store1,
        series: [{
            type: 'column',
            highlight: false,
            xpadding: 0,
            gutter:1,
            groupGutter:0,
            tips: {
                trackMouse: true,
                width: 160,
                height: 80,
                renderer: function(storeItem, item) {
        			// stupid hack
        			var desc;
        			switch (item.attr.fill){
            			case "#94ae0a": desc = "Characteristic";break;
            			case "#115fa6": desc = "Aroma";break;
            			case "#a61120": desc = "Sensation";break;
            			case "#ff8809": desc = "Flavor";break;
        			}
        			this.setTitle(storeItem.get(desc + "Description"));
        	    }
            },
            xField: 'indexId',
            yField: graphFields,
            stacked: true,
            style: {
                opacity: 0.73
            },
            label: {
                field: ['CharacteristicKeyword','AromaKeyword','SensationKeyword','FlavorKeyword'],
                display: 'insideEnd',
                contrast: true,
                font: '18px "Lucida Grande"'
            }
        }]
    });
    
    
    Ext.select(".oldwines div",true).on("mouseenter",function(){
    	store1.loadRecords(generateData(this.id));
    	this.addCls("high");
    }).on("mouseout",function(){
    	store1.loadRecords(generateData("PinotNoir"));
    	this.removeCls("high");
    });
    
    
    var current="Expired"
	var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec")
 
	var countdown = function (yr,m,d){
		theyear=yr;themonth=m;theday=d;
		var today=new Date()
		var todayy=today.getYear()
		if (todayy < 1000)
		todayy+=1900
		var todaym=today.getMonth()
		var todayd=today.getDate()
		var todayh=today.getHours()
		var todaymin=today.getMinutes()
		var todaysec=today.getSeconds()
		var todaystring=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec
		futurestring=montharray[m-1]+" "+d+", "+yr
		dd=Date.parse(futurestring)-Date.parse(todaystring)
		dday=Math.floor(dd/(60*60*1000*24)*1)
		dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1)
		dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1)
		dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1)
		if(dday==0&&dhour==0&&dmin==0&&dsec==1){
			document.getElementById('counter').style.display='none';
			document.getElementById('expired').style.display='block';
			return
		}
		else{
			document.getElementById('countdown_day').innerHTML=dday;
			document.getElementById('countdown_hour').innerHTML=dhour;
			document.getElementById('countdown_min').innerHTML=dmin;
			document.getElementById('countdown_sec').innerHTML=dsec;
			setTimeout(countdown,1000,theyear,themonth,theday)
		}
	}
 
	//MODIFY THIS LINE: enter the count down date using the format year/month/day
    countdown(2011, 3, 14);


});


