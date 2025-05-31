# Typo3 Extension :: eventplanner
With this small event planner the frontend users can register for certain parts of an event. For example, you can coordinate who will help at the grill and who will help at the bar.

## Change log

 4.0.1 :: UPD :: Update (cleaning) TCA configuration
 4.0.0 :: UPD :: Upgrade to TYPO3 13
 3.0.0 :: UPD :: Upgrade to TYPO3 12
 2.2.4 :: FIX :: Remove useless evaluation class
 2.2.3 :: FIX :: Small fixes: backend validations / missing title added / unnecessary outputs removed
 2.2.2 :: FIX :: Small validate fix.
 2.2.1 :: FIX :: Small UI fixes.
 2.2.0 :: ADD :: You can do hidden votes. You can limit the vote per user.
 2.1.1 :: RMV :: Remove the redundant event name: it is better you use the headline for the front end.
 2.1.0 :: FIX :: Fix the plugin configuration / registration
 2.0.8 :: FIX :: Change the max members translation.
 2.0.7 :: FIX :: Make maximal members field visible.
 
 ## Limitations
* This extension is only usable for logged in frontend user. (The admin have to pay that the frontend plugin is only available for logged in users.)

## Installation

You can install the extension via the extensions module or via composer.json. 

![Add the plugin typoscript to the static template](./Documentation/images/screen-insertStaticTemplate.png "Add the plugin typoscript to the static template") 

In the second step you have to add the plugin to the TypoScript. To do this, you need to add the TypoScript of the plugin via the static template. 

## Configuration 

## Using

### Create pages and folder

I always do it this way: I create a page and a folder under it. The folder contains the data. The page the appropriate frontend plugin.

![My favorited folder structure. ](./Documentation/images/screen-folderStructure.png "My favorited folder structure.") 

### Create the data container

In the data folder you create a data record of type "Event plan". (List module > select the data folder > press plus button)

![Create the event plan data record. ](./Documentation/images/screen-createEventPlan.png "Create the event plan data record.") 

Fill the data record. 

![Fill the event plan data record. ](./Documentation/images/screen-fillEventPlan.png "Fill the event plan data record.") 

### Add the frontend plugin

Add the plugin on your event page. 

![Pick the frontend plugin. ](./Documentation/images/screen-pickFrontendPlugin.png "Pick the frontend plugin.") 

Select on the "Plugin" sheet the new event plan. 

![Select the event plan data record. ](./Documentation/images/screen-selectEventPlan.png "Select the event plan data record.") 



