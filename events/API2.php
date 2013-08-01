<?php
/**
 * This library is built by GetShop and are used to communicate with the GetShop backend. 
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

class APIBannerManager {

      var $transport;

      function APIBannerManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Add a new image to an existing bannerset.<br>
     * The fileid is just an identifier and should be generated / stored by the one calling this application<br>
     * 
     * @param id The id to save on.
     * @param fileId The given file id for this image, fetched from the filemanager when uploading the image.
     * @return app_bannermanager_data_BannerSet
     * @throws ErrorException 
     */

     public function addImage($id, $fileId) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data['args']["fileId"] = json_encode($this->transport->object_unset_nulls($fileId));
          $data["method"] = "addImage";
          $data["interfaceName"] = "app.banner.IBannerManager";
          return $this->transport->cast(API::app_bannermanager_data_BannerSet(), $this->transport->sendMessage($data));
     }

     /**
     * Initiate / create a new bannerset.
     * @param width The width for the banners
     * @param height The height for the banners.
     * @param id Specify an id if you want to override the id generation, leave empty otherwhise.
     * @return app_bannermanager_data_BannerSet
     * @throws ErrorException 
     */

     public function createSet($width, $height, $id) {
          $data = array();
          $data['args'] = array();
          $data['args']["width"] = json_encode($this->transport->object_unset_nulls($width));
          $data['args']["height"] = json_encode($this->transport->object_unset_nulls($height));
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "createSet";
          $data["interfaceName"] = "app.banner.IBannerManager";
          return $this->transport->cast(API::app_bannermanager_data_BannerSet(), $this->transport->sendMessage($data));
     }

     /**
     * Delete a given banner set.
     * 
     * @param id The id for the bannerset to delete.
     * @return app_bannermanager_data_BannerSet
     * @throws ErrorException 
     */

     public function deleteSet($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "deleteSet";
          $data["interfaceName"] = "app.banner.IBannerManager";
          return $this->transport->cast(API::app_bannermanager_data_BannerSet(), $this->transport->sendMessage($data));
     }

     /**
     * Fetch an existing bannerset.
     * @param id The id for the bannerset to fetch, if the id does not exists, it will be created.
     * @return app_bannermanager_data_BannerSet
     * @throws ErrorException 
     */

     public function getSet($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "getSet";
          $data["interfaceName"] = "app.banner.IBannerManager";
          return $this->transport->cast(API::app_bannermanager_data_BannerSet(), $this->transport->sendMessage($data));
     }

     /**
     * Add a product to a given image.
     * @param bannerSetId The id of the bannerset which holds the images.
     * @param imageId The image id to link a product to.
     * @param productId The id of the product to be linked.
     * @return app_bannermanager_data_BannerSet
     * @throws ErrorException 
     */

     public function linkProductToImage($bannerSetId, $imageId, $productId) {
          $data = array();
          $data['args'] = array();
          $data['args']["bannerSetId"] = json_encode($this->transport->object_unset_nulls($bannerSetId));
          $data['args']["imageId"] = json_encode($this->transport->object_unset_nulls($imageId));
          $data['args']["productId"] = json_encode($this->transport->object_unset_nulls($productId));
          $data["method"] = "linkProductToImage";
          $data["interfaceName"] = "app.banner.IBannerManager";
          return $this->transport->cast(API::app_bannermanager_data_BannerSet(), $this->transport->sendMessage($data));
     }

     /**
     * Remove an already existing image from a given bannerset.
     * @param bannerSetId The id for the bannerset.
     * @param fileId The file id to remove.
     * @return app_bannermanager_data_BannerSet
     * @throws ErrorException 
     */

     public function removeImage($bannerSetId, $fileId) {
          $data = array();
          $data['args'] = array();
          $data['args']["bannerSetId"] = json_encode($this->transport->object_unset_nulls($bannerSetId));
          $data['args']["fileId"] = json_encode($this->transport->object_unset_nulls($fileId));
          $data["method"] = "removeImage";
          $data["interfaceName"] = "app.banner.IBannerManager";
          return $this->transport->cast(API::app_bannermanager_data_BannerSet(), $this->transport->sendMessage($data));
     }

     /**
     * Update a given bannerset.<br>
     * If the id of the bannerset does not exists, it will automatically create one for you.<br>
     * 
     * @param set The bannerset to save.
     * @return app_bannermanager_data_BannerSet
     * @throws ErrorException 
     */

     public function saveSet($app_bannermanager_data_BannerSet) {
          $data = array();
          $data['args'] = array();
          $data['args']["app_bannermanager_data_BannerSet"] = json_encode($this->transport->object_unset_nulls($app_bannermanager_data_BannerSet));
          $data["method"] = "saveSet";
          $data["interfaceName"] = "app.banner.IBannerManager";
          return $this->transport->cast(API::app_bannermanager_data_BannerSet(), $this->transport->sendMessage($data));
     }

}
class APIContentManager {

      var $transport;

      function APIContentManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Create a new instance for the content manager.<br>
     * An id will automatically be generated and returned on creation.<br>
     * 
     * @param content The content to build upon.
     * @return String
     * @throws ErrorException
     */

     public function createContent($content) {
          $data = array();
          $data['args'] = array();
          $data['args']["content"] = json_encode($this->transport->object_unset_nulls($content));
          $data["method"] = "createContent";
          $data["interfaceName"] = "app.content.IContentManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Remove the content for a given id.
     * @param id The id to remove the content for.
     * @throws ErrorException
     */

     public function deleteContent($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "deleteContent";
          $data["interfaceName"] = "app.content.IContentManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch all content saved until now.
     * @return HashMap
     * @throws ErrorException 
     */

     public function getAllContent() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getAllContent";
          $data["interfaceName"] = "app.content.IContentManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch the content for a given id.
     * @param id The id which is identifying the content.
     * @return String
     * @throws ErrorException
     */

     public function getContent($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "getContent";
          $data["interfaceName"] = "app.content.IContentManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Update / replace the content for a given id.
     * @param id The id to update the content for.
     * @param content The content to update. This could be html / text.
     * @throws ErrorException
     */

     public function saveContent($id, $content) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data['args']["content"] = json_encode($this->transport->object_unset_nulls($content));
          $data["method"] = "saveContent";
          $data["interfaceName"] = "app.content.IContentManager";
          return $this->transport->sendMessage($data);
     }

}
class APIFooterManager {

      var $transport;

      function APIFooterManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Get the current configuration.
     * @return app_footermanager_data_Configuration
     * @throws ErrorException 
     */

     public function getConfiguration() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getConfiguration";
          $data["interfaceName"] = "app.footer.IFooterManager";
          return $this->transport->cast(API::app_footermanager_data_Configuration(), $this->transport->sendMessage($data));
     }

     /**
     * Change the layout for the columns.<br>
     * Defaults to 1 if nothing else is set.<br>
     * @param numberOfColumns The number of columns you want to display.
     * @throws ErrorException 
     */

     public function setLayout($numberOfColumns) {
          $data = array();
          $data['args'] = array();
          $data['args']["numberOfColumns"] = json_encode($this->transport->object_unset_nulls($numberOfColumns));
          $data["method"] = "setLayout";
          $data["interfaceName"] = "app.footer.IFooterManager";
          return $this->transport->cast(API::app_footermanager_data_Configuration(), $this->transport->sendMessage($data));
     }

     /**
     * Change the type of a given column.
     * @param column The column it regards
     * @param type The type,0 for text, 1 for list.
     * @return app_footermanager_data_Configuration
     * @throws ErrorException 
     */

     public function setType($column, $type) {
          $data = array();
          $data['args'] = array();
          $data['args']["column"] = json_encode($this->transport->object_unset_nulls($column));
          $data['args']["type"] = json_encode($this->transport->object_unset_nulls($type));
          $data["method"] = "setType";
          $data["interfaceName"] = "app.footer.IFooterManager";
          return $this->transport->cast(API::app_footermanager_data_Configuration(), $this->transport->sendMessage($data));
     }

}
class APILogoManager {

      var $transport;

      function APILogoManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Remove the current logo.
     * @return void
     * @throws ErrorException 
     */

     public function deleteLogo() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "deleteLogo";
          $data["interfaceName"] = "app.logo.ILogoManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Get the logo file id.
     * @return app_logomanager_data_SavedLogo
     * @throws ErrorException 
     */

     public function getLogo() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getLogo";
          $data["interfaceName"] = "app.logo.ILogoManager";
          return $this->transport->cast(API::app_logomanager_data_SavedLogo(), $this->transport->sendMessage($data));
     }

     /**
     * Set a logo to your webshop.
     * @param fileId The file id generated by the one storing this.
     * @return void
     * @throws ErrorException 
     */

     public function setLogo($fileId) {
          $data = array();
          $data['args'] = array();
          $data['args']["fileId"] = json_encode($this->transport->object_unset_nulls($fileId));
          $data["method"] = "setLogo";
          $data["interfaceName"] = "app.logo.ILogoManager";
          return $this->transport->sendMessage($data);
     }

}
class APINewsManager {

      var $transport;

      function APINewsManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Add a new news entry.
     * @param news The news object to add.
     * @return String
     * @throws ErrorException 
     */

     public function addNews($news) {
          $data = array();
          $data['args'] = array();
          $data['args']["news"] = json_encode($this->transport->object_unset_nulls($news));
          $data["method"] = "addNews";
          $data["interfaceName"] = "app.news.INewsManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Add a subscriber.
     * Whenever a new news is updated to this, the subscribe will get an email.
     * @param email The email address for the subscriber.
     * @return app_newsmanager_data_MailSubscription
     * @throws ErrorException 
     */

     public function addSubscriber($email) {
          $data = array();
          $data['args'] = array();
          $data['args']["email"] = json_encode($this->transport->object_unset_nulls($email));
          $data["method"] = "addSubscriber";
          $data["interfaceName"] = "app.news.INewsManager";
          return $this->transport->cast(API::app_newsmanager_data_MailSubscription(), $this->transport->sendMessage($data));
     }

     /**
     * Delete a given news id.
     * @param id The id for the news to delete.
     * @throws ErrorException 
     */

     public function deleteNews($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "deleteNews";
          $data["interfaceName"] = "app.news.INewsManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch all news added.
     * @return List
     * @throws ErrorException 
     */

     public function getAllNews() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getAllNews";
          $data["interfaceName"] = "app.news.INewsManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Get all subscribers.
     * @return List
     * @throws ErrorException 
     */

     public function getAllSubscribers() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getAllSubscribers";
          $data["interfaceName"] = "app.news.INewsManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Remove an existing subscriber.
     * @param subscriberId The subscribers id found in the MailSubscriber object.
     * @return void
     * @throws ErrorException 
     */

     public function removeSubscriber($subscriberId) {
          $data = array();
          $data['args'] = array();
          $data['args']["subscriberId"] = json_encode($this->transport->object_unset_nulls($subscriberId));
          $data["method"] = "removeSubscriber";
          $data["interfaceName"] = "app.news.INewsManager";
          return $this->transport->sendMessage($data);
     }

}
class APIAppManager {

      var $transport;

      function APIAppManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Create a new application.
     * @param appName The name of the application
     * @return core_appmanager_data_ApplicationSettings
     */

     public function createApplication($appName) {
          $data = array();
          $data['args'] = array();
          $data['args']["appName"] = json_encode($this->transport->object_unset_nulls($appName));
          $data["method"] = "createApplication";
          $data["interfaceName"] = "core.appmanager.IAppManager";
          return $this->transport->cast(API::core_appmanager_data_ApplicationSettings(), $this->transport->sendMessage($data));
     }

     /**
     * Delete an application owned by you.
     * @param identificationId
     * @throws ErrorException 
     */

     public function deleteApplication($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "deleteApplication";
          $data["interfaceName"] = "core.appmanager.IAppManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Get all the applications added to this store.
     * @param includeAppSettings Do you need the application settings object or not?
     * @throws ErrorException 
     */

     public function getAllApplicationSubscriptions($includeAppSettings) {
          $data = array();
          $data['args'] = array();
          $data['args']["includeAppSettings"] = json_encode($this->transport->object_unset_nulls($includeAppSettings));
          $data["method"] = "getAllApplicationSubscriptions";
          $data["interfaceName"] = "core.appmanager.IAppManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch all the applications connected to you.
     * @return core_appmanager_data_AvailableApplications
     */

     public function getAllApplications() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getAllApplications";
          $data["interfaceName"] = "core.appmanager.IAppManager";
          return $this->transport->cast(API::core_appmanager_data_AvailableApplications(), $this->transport->sendMessage($data));
     }

     /**
     * Fetch the settings for a given id.
     * @param id
     * @return core_appmanager_data_ApplicationSettings
     * @throws ErrorException 
     */

     public function getApplication($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "getApplication";
          $data["interfaceName"] = "core.appmanager.IAppManager";
          return $this->transport->cast(API::core_appmanager_data_ApplicationSettings(), $this->transport->sendMessage($data));
     }

     /**
     * Fetch all application that has been marked for synchronization.
     * When this method is called all objects related to this will unqueued.
     * @return List
     * @throws ErrorException 
     */

     public function getSyncApplications() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getSyncApplications";
          $data["interfaceName"] = "core.appmanager.IAppManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch all application that needs to be payed for.
     * @return List
     * @throws ErrorException 
     */

     public function getUnpayedSubscription() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getUnpayedSubscription";
          $data["interfaceName"] = "core.appmanager.IAppManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Check if the synchronization client is connected or not.
     * @return boolean
     * @throws ErrorException 
     */

     public function isSyncToolConnected() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "isSyncToolConnected";
          $data["interfaceName"] = "core.appmanager.IAppManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Save applications
     * @param settings 
     */

     public function saveApplication($core_appmanager_data_ApplicationSettings) {
          $data = array();
          $data['args'] = array();
          $data['args']["core_appmanager_data_ApplicationSettings"] = json_encode($this->transport->object_unset_nulls($core_appmanager_data_ApplicationSettings));
          $data["method"] = "saveApplication";
          $data["interfaceName"] = "core.appmanager.IAppManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Notify the synchronization server to synchronize this application for the logged on user.
     * @param id
     * @throws ErrorException 
     */

     public function setSyncApplication($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "setSyncApplication";
          $data["interfaceName"] = "core.appmanager.IAppManager";
          return $this->transport->sendMessage($data);
     }

}
class APICalendarManager {

      var $transport;

      function APICalendarManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Add a given user to a given event.
     * @param userId The user id to add to a the given event (see usermanager for more inforamtion about this id)
     * @param eventId The event id to attach to the user.
     * @param password A password you want to attach to the email that is being sent to the user.
     * @param username A username you want to attach to the email that is being sent to the user.
     * @return void
     * @throws ErrorException 
     */

     public function addUserToEvent($userId, $eventId, $password, $username) {
          $data = array();
          $data['args'] = array();
          $data['args']["userId"] = json_encode($this->transport->object_unset_nulls($userId));
          $data['args']["eventId"] = json_encode($this->transport->object_unset_nulls($eventId));
          $data['args']["password"] = json_encode($this->transport->object_unset_nulls($password));
          $data['args']["username"] = json_encode($this->transport->object_unset_nulls($username));
          $data["method"] = "addUserToEvent";
          $data["interfaceName"] = "core.calendar.ICalendarManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Confirms a entry.
     * 
     * @param entryId
     * @throws ErrorException 
     */

     public function confirmEntry($entryId) {
          $data = array();
          $data['args'] = array();
          $data['args']["entryId"] = json_encode($this->transport->object_unset_nulls($entryId));
          $data["method"] = "confirmEntry";
          $data["interfaceName"] = "core.calendar.ICalendarManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Create a new entry to the calendar on a given date.
     * @param year The year to attach the entry to
     * @param month The month to attach the entry to
     * @param day The day to attach the entry to
     * @param entry The entry to attach
     * @return core_calendarmanager_data_Entry
     * @throws ErrorException 
     */

     public function createEntry($year, $month, $day) {
          $data = array();
          $data['args'] = array();
          $data['args']["year"] = json_encode($this->transport->object_unset_nulls($year));
          $data['args']["month"] = json_encode($this->transport->object_unset_nulls($month));
          $data['args']["day"] = json_encode($this->transport->object_unset_nulls($day));
          $data["method"] = "createEntry";
          $data["interfaceName"] = "core.calendar.ICalendarManager";
          return $this->transport->cast(API::core_calendarmanager_data_Entry(), $this->transport->sendMessage($data));
     }

     /**
     * Delete an existing entry by a given id from the calendar.
     * @param id The id of the entry to delete.
     * @throws ErrorException 
     */

     public function deleteEntry($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "deleteEntry";
          $data["interfaceName"] = "core.calendar.ICalendarManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Get all entries to a given day
     * @param year The year to fetch the entries on.
     * @param month The month to fetch the entries on.
     * @param day The day to fetch the entries on.
     * @return List
     * @throws ErrorException 
     */

     public function getEntries($year, $month, $day) {
          $data = array();
          $data['args'] = array();
          $data['args']["year"] = json_encode($this->transport->object_unset_nulls($year));
          $data['args']["month"] = json_encode($this->transport->object_unset_nulls($month));
          $data['args']["day"] = json_encode($this->transport->object_unset_nulls($day));
          $data["method"] = "getEntries";
          $data["interfaceName"] = "core.calendar.ICalendarManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Gives you the specified entry by id
     * 
     * @param entryId
     * @return core_calendarmanager_data_Entry
     */

     public function getEntry($entryId) {
          $data = array();
          $data['args'] = array();
          $data['args']["entryId"] = json_encode($this->transport->object_unset_nulls($entryId));
          $data["method"] = "getEntry";
          $data["interfaceName"] = "core.calendar.ICalendarManager";
          return $this->transport->cast(API::core_calendarmanager_data_Entry(), $this->transport->sendMessage($data));
     }

     /**
     * Get all data attached to a given month.
     * @param year The year to fetch
     * @param month The month to fetch
     * @param includeExtraEvents 
     * @return core_calendarmanager_data_Month
     * @throws ErrorException 
     */

     public function getMonth($year, $month, $includeExtraEvents) {
          $data = array();
          $data['args'] = array();
          $data['args']["year"] = json_encode($this->transport->object_unset_nulls($year));
          $data['args']["month"] = json_encode($this->transport->object_unset_nulls($month));
          $data['args']["includeExtraEvents"] = json_encode($this->transport->object_unset_nulls($includeExtraEvents));
          $data["method"] = "getMonth";
          $data["interfaceName"] = "core.calendar.ICalendarManager";
          return $this->transport->cast(API::core_calendarmanager_data_Month(), $this->transport->sendMessage($data));
     }

     /**
     * Remove a given user from a given event.
     * @param userId The userid for the event to be removed. (see usermanager for more inforamtion about this id)
     * @param eventId The id of the event for the user to be removed from.
     * @return void
     * @throws ErrorException 
     */

     public function removeUserFromEvent($userId, $eventId) {
          $data = array();
          $data['args'] = array();
          $data['args']["userId"] = json_encode($this->transport->object_unset_nulls($userId));
          $data['args']["eventId"] = json_encode($this->transport->object_unset_nulls($eventId));
          $data["method"] = "removeUserFromEvent";
          $data["interfaceName"] = "core.calendar.ICalendarManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Save an already existing entry.
     * @param entry
     * @throws ErrorException 
     */

     public function saveEntry($core_calendarmanager_data_Entry) {
          $data = array();
          $data['args'] = array();
          $data['args']["core_calendarmanager_data_Entry"] = json_encode($this->transport->object_unset_nulls($core_calendarmanager_data_Entry));
          $data["method"] = "saveEntry";
          $data["interfaceName"] = "core.calendar.ICalendarManager";
          return $this->transport->sendMessage($data);
     }

     /**
     Remind a given list of users about a given entry.
     * @param entryId The id of the entry to remind about.
     * @param byEmail Remind users by email (true to send)
     * @param bySMS Remind users by sms (true to send)
     * @param users A list of user ids to remind.
     * @param text The text to send when reminding.
     * @param subject A subject to attach to the email.
     * @return void
     * @throws ErrorException 
     */

     public function sendReminderToUser($byEmail, $bySMS, $users, $text, $subject) {
          $data = array();
          $data['args'] = array();
          $data['args']["byEmail"] = json_encode($this->transport->object_unset_nulls($byEmail));
          $data['args']["bySMS"] = json_encode($this->transport->object_unset_nulls($bySMS));
          $data['args']["users"] = json_encode($this->transport->object_unset_nulls($users));
          $data['args']["text"] = json_encode($this->transport->object_unset_nulls($text));
          $data['args']["subject"] = json_encode($this->transport->object_unset_nulls($subject));
          $data["method"] = "sendReminderToUser";
          $data["interfaceName"] = "core.calendar.ICalendarManager";
          return $this->transport->sendMessage($data);
     }

}
class APICartManager {

      var $transport;

      function APICartManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Add a new product to the cart.
     * @param productId The product id generated by the productmanager.
     * @param int Number instances of the product ordered.
     * @return core_cartmanager_data_Cart
     * @throws ErrorException 
     */

     public function addProduct($productId, $count, $variations) {
          $data = array();
          $data['args'] = array();
          $data['args']["productId"] = json_encode($this->transport->object_unset_nulls($productId));
          $data['args']["count"] = json_encode($this->transport->object_unset_nulls($count));
          $data['args']["variations"] = json_encode($this->transport->object_unset_nulls($variations));
          $data["method"] = "addProduct";
          $data["interfaceName"] = "core.cartmanager.ICartManager";
          return $this->transport->cast(API::core_cartmanager_data_Cart(), $this->transport->sendMessage($data));
     }

     /**
     * Send in a cart and you shall have the total price for all products.
     */

     public function calculateTotalCost($core_cartmanager_data_Cart) {
          $data = array();
          $data['args'] = array();
          $data['args']["core_cartmanager_data_Cart"] = json_encode($this->transport->object_unset_nulls($core_cartmanager_data_Cart));
          $data["method"] = "calculateTotalCost";
          $data["interfaceName"] = "core.cartmanager.ICartManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Clear the current shopping cart.
     */

     public function clear() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "clear";
          $data["interfaceName"] = "core.cartmanager.ICartManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch the current cart.
     * @return core_cartmanager_data_Cart
     * @throws ErrorException 
     */

     public function getCart() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getCart";
          $data["interfaceName"] = "core.cartmanager.ICartManager";
          return $this->transport->cast(API::core_cartmanager_data_Cart(), $this->transport->sendMessage($data));
     }

     /**
     * Returns the current total amount
     * note, this does not include shipping.
     * 
     * @return Double
     * @throws ErrorException 
     */

     public function getCartTotalAmount() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getCartTotalAmount";
          $data["interfaceName"] = "core.cartmanager.ICartManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Remove an added product from the cart.
     * @param productId The product id generated by the productmanager, that has been added to the cart.
     * @return core_cartmanager_data_Cart
     * @throws ErrorException 
     */

     public function removeProduct($cartItemId) {
          $data = array();
          $data['args'] = array();
          $data['args']["cartItemId"] = json_encode($this->transport->object_unset_nulls($cartItemId));
          $data["method"] = "removeProduct";
          $data["interfaceName"] = "core.cartmanager.ICartManager";
          return $this->transport->cast(API::core_cartmanager_data_Cart(), $this->transport->sendMessage($data));
     }

     /**
     * Set a new address to the current cart.
     */

     public function setAddress($core_usermanager_data_Address) {
          $data = array();
          $data['args'] = array();
          $data['args']["core_usermanager_data_Address"] = json_encode($this->transport->object_unset_nulls($core_usermanager_data_Address));
          $data["method"] = "setAddress";
          $data["interfaceName"] = "core.cartmanager.ICartManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Change the number of instances added to the product.
     * @param productId The product id generated by the productmanager.
     * @param count The number of instances (has to be a positive integer)
     * @return core_cartmanager_data_Cart
     * @throws ErrorException 
     */

     public function updateProductCount($cartItemId, $count) {
          $data = array();
          $data['args'] = array();
          $data['args']["cartItemId"] = json_encode($this->transport->object_unset_nulls($cartItemId));
          $data['args']["count"] = json_encode($this->transport->object_unset_nulls($count));
          $data["method"] = "updateProductCount";
          $data["interfaceName"] = "core.cartmanager.ICartManager";
          return $this->transport->cast(API::core_cartmanager_data_Cart(), $this->transport->sendMessage($data));
     }

}
class APIChatManager {

      var $transport;

      function APIChatManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Reply to a chat message.
     * 
     * @param id - Chatters id
     * @param message
     */

     public function closeChat($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "closeChat";
          $data["interfaceName"] = "core.chat.IChatManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Returns a list of available poeple to chat with.
     * @return List
     */

     public function getChatters() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getChatters";
          $data["interfaceName"] = "core.chat.IChatManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Get all your chat messages
     * 
     * @return List
     */

     public function getMessages() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getMessages";
          $data["interfaceName"] = "core.chat.IChatManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Notify the manager that someone is online, this will effectivly stop the notification to continue.
     * 
     * No need to notify everyone if the chat is handeled properly anyway.
     * @throws ErrorException 
     */

     public function pingMobileChat($chatterid) {
          $data = array();
          $data['args'] = array();
          $data['args']["chatterid"] = json_encode($this->transport->object_unset_nulls($chatterid));
          $data["method"] = "pingMobileChat";
          $data["interfaceName"] = "core.chat.IChatManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Reply to a chat message.
     * 
     * @param id - Chatters id
     * @param message
     */

     public function replyToChat($id, $message) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data['args']["message"] = json_encode($this->transport->object_unset_nulls($message));
          $data["method"] = "replyToChat";
          $data["interfaceName"] = "core.chat.IChatManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Send a message to administrator
     * 
     * @param message
     * @throws ErrorException 
     */

     public function sendMessage($message) {
          $data = array();
          $data['args'] = array();
          $data['args']["message"] = json_encode($this->transport->object_unset_nulls($message));
          $data["method"] = "sendMessage";
          $data["interfaceName"] = "core.chat.IChatManager";
          return $this->transport->sendMessage($data);
     }

}
class APIGalleryManager {

      var $transport;

      function APIGalleryManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Add a image to a given gallery.
     * @param galleryId The id for the gallery, if this does not exists, it creates a gallery related to this id.
     * @param imageId The image id generated by the filemanager.
     * @param description A description to the image.
     * @param title A title to the image.
     * @throws ErrorException 
     */

     public function addImageToGallery($galleryId, $imageId, $description, $title) {
          $data = array();
          $data['args'] = array();
          $data['args']["galleryId"] = json_encode($this->transport->object_unset_nulls($galleryId));
          $data['args']["imageId"] = json_encode($this->transport->object_unset_nulls($imageId));
          $data['args']["description"] = json_encode($this->transport->object_unset_nulls($description));
          $data['args']["title"] = json_encode($this->transport->object_unset_nulls($title));
          $data["method"] = "addImageToGallery";
          $data["interfaceName"] = "core.gallerymanager.IGalleryManager";
          return $this->transport->cast(API::app_gallerymanager_data_ImageEntry(), $this->transport->sendMessage($data));
     }

     /**
     * Create a new gallery.
     * @return String
     * @throws ErrorException 
     */

     public function createImageGallery() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "createImageGallery";
          $data["interfaceName"] = "core.gallerymanager.IGalleryManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Remove an already existing image.
     * @param entryId The id of the image to remove.
     * @throws ErrorException 
     */

     public function deleteImage($entryId) {
          $data = array();
          $data['args'] = array();
          $data['args']["entryId"] = json_encode($this->transport->object_unset_nulls($entryId));
          $data["method"] = "deleteImage";
          $data["interfaceName"] = "core.gallerymanager.IGalleryManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch all images binded to a given gallery id.
     * @param id The id to fetch the entries from.
     * @return List
     * @throws ErrorException 
     */

     public function getAllImages($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "getAllImages";
          $data["interfaceName"] = "core.gallerymanager.IGalleryManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Find an existing entry.
     * @param id The id for search for (found in the ImageEntry object)
     * @return app_gallerymanager_data_ImageEntry
     * @throws ErrorException 
     */

     public function getEntry($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "getEntry";
          $data["interfaceName"] = "core.gallerymanager.IGalleryManager";
          return $this->transport->cast(API::app_gallerymanager_data_ImageEntry(), $this->transport->sendMessage($data));
     }

     /**
     * Update an already existing image.
     * @param entry The entry to update.
     * @throws ErrorException 
     */

     public function saveEntry($app_gallerymanager_data_ImageEntry) {
          $data = array();
          $data['args'] = array();
          $data['args']["app_gallerymanager_data_ImageEntry"] = json_encode($this->transport->object_unset_nulls($app_gallerymanager_data_ImageEntry));
          $data["method"] = "saveEntry";
          $data["interfaceName"] = "core.gallerymanager.IGalleryManager";
          return $this->transport->sendMessage($data);
     }

}
class APIGetShop {

      var $transport;

      function APIGetShop($transport) {
           $this->transport = $transport;
      }

     /**
     * 
     * @param userId
     * @param partner
     * @param password
     * @throws ErrorException 
     */

     public function addUserToPartner($userId, $partner, $password) {
          $data = array();
          $data['args'] = array();
          $data['args']["userId"] = json_encode($this->transport->object_unset_nulls($userId));
          $data['args']["partner"] = json_encode($this->transport->object_unset_nulls($partner));
          $data['args']["password"] = json_encode($this->transport->object_unset_nulls($password));
          $data["method"] = "addUserToPartner";
          $data["interfaceName"] = "core.getshop.IGetShop";
          return $this->transport->sendMessage($data);
     }

     /**
     * When an administrator has logged on, it can call on this call to connect its store to a partner.
     */

     public function connectStoreToPartner($partner) {
          $data = array();
          $data['args'] = array();
          $data['args']["partner"] = json_encode($this->transport->object_unset_nulls($partner));
          $data["method"] = "connectStoreToPartner";
          $data["interfaceName"] = "core.getshop.IGetShop";
          return $this->transport->sendMessage($data);
     }

     /**
     * Find the store address for a given application.
     * @param uuid The appid.
     * @return String
     * @throws ErrorException 
     */

     public function findAddressForApplication($uuid) {
          $data = array();
          $data['args'] = array();
          $data['args']["uuid"] = json_encode($this->transport->object_unset_nulls($uuid));
          $data["method"] = "findAddressForApplication";
          $data["interfaceName"] = "core.getshop.IGetShop";
          return $this->transport->sendMessage($data);
     }

     /**
     * Need to figure out what address is connected to a specific uuid?
     * Remember this is query is quite slow. so cache the result.
     * @param uuid
     * @return String
     * @throws ErrorException 
     */

     public function findAddressForUUID($uuid) {
          $data = array();
          $data['args'] = array();
          $data['args']["uuid"] = json_encode($this->transport->object_unset_nulls($uuid));
          $data["method"] = "findAddressForUUID";
          $data["interfaceName"] = "core.getshop.IGetShop";
          return $this->transport->sendMessage($data);
     }

     /**
     * Get the partner id attached to this user.
     * @return String
     * @throws ErrorException 
     */

     public function getPartnerId() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getPartnerId";
          $data["interfaceName"] = "core.getshop.IGetShop";
          return $this->transport->sendMessage($data);
     }

     /**
     * 
     * @param code
     * @return List
     */

     public function getStores($code) {
          $data = array();
          $data['args'] = array();
          $data['args']["code"] = json_encode($this->transport->object_unset_nulls($code));
          $data["method"] = "getStores";
          $data["interfaceName"] = "core.getshop.IGetShop";
          return $this->transport->sendMessage($data);
     }

     /**
     * 
     * @param userId
     * @param partner
     * @param password
     * @throws ErrorException 
     */

     public function getStoresConnectedToMe() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getStoresConnectedToMe";
          $data["interfaceName"] = "core.getshop.IGetShop";
          return $this->transport->sendMessage($data);
     }

}
class APIListManager {

      var $transport;

      function APIListManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Add a new entry to a given list.<br>
     * For most components like leftmenu, topmenu, footer, category displayer the list id is the same as the application id.<br>
     * When creating an entry, a page will automatically be created and attached to this entry if not exists.<br>
     * 
     * @param listId The id for the list to add the entry to, if list does not exists, it will be created automatically.
     * @param entry The entry to append to the list.
     * @param parentPageId See the pagemanager for more information about the page id, when the page to this entry is created set this id as the parent.
     * @return core_listmanager_data_Entry
     */

     public function addEntry($listId, $core_listmanager_data_Entry, $parentPageId) {
          $data = array();
          $data['args'] = array();
          $data['args']["listId"] = json_encode($this->transport->object_unset_nulls($listId));
          $data['args']["core_listmanager_data_Entry"] = json_encode($this->transport->object_unset_nulls($core_listmanager_data_Entry));
          $data['args']["parentPageId"] = json_encode($this->transport->object_unset_nulls($parentPageId));
          $data["method"] = "addEntry";
          $data["interfaceName"] = "core.listmanager.IListManager";
          return $this->transport->cast(API::core_listmanager_data_Entry(), $this->transport->sendMessage($data));
     }

     /**
     * Remove all list entries for a specified list
     * 
     * @param listId
     * @throws ErrorException 
     */

     public function clearList($listId) {
          $data = array();
          $data['args'] = array();
          $data['args']["listId"] = json_encode($this->transport->object_unset_nulls($listId));
          $data["method"] = "clearList";
          $data["interfaceName"] = "core.listmanager.IListManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * If you would like to combine more lists to a current list, you can do it by using this call.<br>
     * 
     * @param toListId The current list to be appended on.
     * @param newListId The list which you would like to combine.
     * @throws ErrorException 
     */

     public function combineList($toListId, $newListId) {
          $data = array();
          $data['args'] = array();
          $data['args']["toListId"] = json_encode($this->transport->object_unset_nulls($toListId));
          $data['args']["newListId"] = json_encode($this->transport->object_unset_nulls($newListId));
          $data["method"] = "combineList";
          $data["interfaceName"] = "core.listmanager.IListManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Create a list id, this will create a a new list for you.
     * @return String
     */

     public function createListId() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "createListId";
          $data["interfaceName"] = "core.listmanager.IListManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Delete an already existing entry from a list.
     * @param id The of the entry to delete.
     * @param id The id of the list to remove from.
     */

     public function deleteEntry($id, $listId) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data['args']["listId"] = json_encode($this->transport->object_unset_nulls($listId));
          $data["method"] = "deleteEntry";
          $data["interfaceName"] = "core.listmanager.IListManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch a list of all lists combined with a given list.
     * @param listId
     * @throws ErrorException 
     */

     public function getCombinedLists($listId) {
          $data = array();
          $data['args'] = array();
          $data['args']["listId"] = json_encode($this->transport->object_unset_nulls($listId));
          $data["method"] = "getCombinedLists";
          $data["interfaceName"] = "core.listmanager.IListManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch a list from the system.
     * @param listId The id for the list to fetch
     * @return List
     */

     public function getList($listId) {
          $data = array();
          $data['args'] = array();
          $data['args']["listId"] = json_encode($this->transport->object_unset_nulls($listId));
          $data["method"] = "getList";
          $data["interfaceName"] = "core.listmanager.IListManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch a single menu entry.
     * @param id The id for the entry to fetch.
     * @return core_listmanager_data_Entry
     */

     public function getListEntry($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "getListEntry";
          $data["interfaceName"] = "core.listmanager.IListManager";
          return $this->transport->cast(API::core_listmanager_data_Entry(), $this->transport->sendMessage($data));
     }

     /**
     * Fetch a list of ids that current shop has.<br>
     * This will return a list with the ids for all lists created by this webshop.<br>
     * 
     * @return List
     */

     public function getLists() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getLists";
          $data["interfaceName"] = "core.listmanager.IListManager";
          return $this->transport->sendMessage($data);
     }

     /**
    * Order a entry on the list.
    * @param id The id for the entry to move / reorder.
    * @param after Put it after a given entry (this will be the id for the given entry). To move the entry to the top leave this empty.
    * @param parent If you want to move the entry into a given entry, then specify the id to the entry here. Leave empty to move to top.
     * @return core_listmanager_data_Entry
    */

     public function orderEntry($id, $after, $parentId) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data['args']["after"] = json_encode($this->transport->object_unset_nulls($after));
          $data['args']["parentId"] = json_encode($this->transport->object_unset_nulls($parentId));
          $data["method"] = "orderEntry";
          $data["interfaceName"] = "core.listmanager.IListManager";
          return $this->transport->cast(API::core_listmanager_data_Entry(), $this->transport->sendMessage($data));
     }

     /**
     * Translate all antries found in a given list of entry ids.
     * @param entryIds A list of entries id to translate.
     * @return HashMap
     * @throws ErrorException 
     */

     public function translateEntries($entryIds) {
          $data = array();
          $data['args'] = array();
          $data['args']["entryIds"] = json_encode($this->transport->object_unset_nulls($entryIds));
          $data["method"] = "translateEntries";
          $data["interfaceName"] = "core.listmanager.IListManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Does the exact opposite as combineList(...), removes a list from a combined list.
     * @param fromListId The id of the list to be removed from.
     * @param toRemoveId The id of the list to remove.
     * @throws ErrorException 
     */

     public function unCombineList($fromListId, $toRemoveId) {
          $data = array();
          $data['args'] = array();
          $data['args']["fromListId"] = json_encode($this->transport->object_unset_nulls($fromListId));
          $data['args']["toRemoveId"] = json_encode($this->transport->object_unset_nulls($toRemoveId));
          $data["method"] = "unCombineList";
          $data["interfaceName"] = "core.listmanager.IListManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Update an already existing entry
     * @param entry The entry to update.
     * @return void
     */

     public function updateEntry($core_listmanager_data_Entry) {
          $data = array();
          $data['args'] = array();
          $data['args']["core_listmanager_data_Entry"] = json_encode($this->transport->object_unset_nulls($core_listmanager_data_Entry));
          $data["method"] = "updateEntry";
          $data["interfaceName"] = "core.listmanager.IListManager";
          return $this->transport->sendMessage($data);
     }

}
class APIMessageManager {

      var $transport;

      function APIMessageManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Get how many messages a user has sent.
     * 
     * @param year
     * @param month
     * @return int
     */

     public function getSmsCount($year, $month) {
          $data = array();
          $data['args'] = array();
          $data['args']["year"] = json_encode($this->transport->object_unset_nulls($year));
          $data['args']["month"] = json_encode($this->transport->object_unset_nulls($month));
          $data["method"] = "getSmsCount";
          $data["interfaceName"] = "core.messagemanager.IMessageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Send a mail.
     * @param to The address to send to
     * @param toName The name of the one receiving it.
     * @param subject The subject of the mail.
     * @param content The content to send
     * @param from The email sent from.
     * @param fromName The name of the sender.
     */

     public function sendMail($to, $toName, $subject, $content, $from, $fromName) {
          $data = array();
          $data['args'] = array();
          $data['args']["to"] = json_encode($this->transport->object_unset_nulls($to));
          $data['args']["toName"] = json_encode($this->transport->object_unset_nulls($toName));
          $data['args']["subject"] = json_encode($this->transport->object_unset_nulls($subject));
          $data['args']["content"] = json_encode($this->transport->object_unset_nulls($content));
          $data['args']["from"] = json_encode($this->transport->object_unset_nulls($from));
          $data['args']["fromName"] = json_encode($this->transport->object_unset_nulls($fromName));
          $data["method"] = "sendMail";
          $data["interfaceName"] = "core.messagemanager.IMessageManager";
          return $this->transport->sendMessage($data);
     }

}
class APIOrderManager {

      var $transport;

      function APIOrderManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Create an order out of a given cart.
     * @param cart The cart object generated by cartmanager.
     * @return core_ordermanager_data_Order
     * @throws ErrorException 
     */

     public function createOrder($core_usermanager_data_Address) {
          $data = array();
          $data['args'] = array();
          $data['args']["core_usermanager_data_Address"] = json_encode($this->transport->object_unset_nulls($core_usermanager_data_Address));
          $data["method"] = "createOrder";
          $data["interfaceName"] = "core.ordermanager.IOrderManager";
          return $this->transport->cast(API::core_ordermanager_data_Order(), $this->transport->sendMessage($data));
     }

     /**
     * Fetch a single order based on its id.
     * @param orderId
     * @return core_ordermanager_data_Order
     * @throws ErrorException 
     */

     public function getOrder($orderId) {
          $data = array();
          $data['args'] = array();
          $data['args']["orderId"] = json_encode($this->transport->object_unset_nulls($orderId));
          $data["method"] = "getOrder";
          $data["interfaceName"] = "core.ordermanager.IOrderManager";
          return $this->transport->cast(API::core_ordermanager_data_Order(), $this->transport->sendMessage($data));
     }

     /**
     * Get a list of already created orders.
     * @param orderIds A list of all orders you want to fetch, all orders are retrieved if this list is empty.
     * @param page What page are you fetching (default 0)
     * @param pageSize Number of entries for each page (default 10)
     * @return List
     * @throws ErrorException 
     */

     public function getOrders($orderIds, $page, $pageSize) {
          $data = array();
          $data['args'] = array();
          $data['args']["orderIds"] = json_encode($this->transport->object_unset_nulls($orderIds));
          $data['args']["page"] = json_encode($this->transport->object_unset_nulls($page));
          $data['args']["pageSize"] = json_encode($this->transport->object_unset_nulls($pageSize));
          $data["method"] = "getOrders";
          $data["interfaceName"] = "core.ordermanager.IOrderManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Update or modify an existing order. 
     * @param order The order to modify
     * @return void
     * @throws ErrorException 
     */

     public function saveOrder($core_ordermanager_data_Order) {
          $data = array();
          $data['args'] = array();
          $data['args']["core_ordermanager_data_Order"] = json_encode($this->transport->object_unset_nulls($core_ordermanager_data_Order));
          $data["method"] = "saveOrder";
          $data["interfaceName"] = "core.ordermanager.IOrderManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * If everything is ok, the price is the same as the order and the currency, then update the status.
     * @param password A predefined password needed to update the status.
     * @param orderId The id of the order to update
     * @param currency The currency the transaction returned
     * @param price The price.
     * @throws ErrorException 
     */

     public function setOrderStatus($password, $orderId, $currency, $price, $status) {
          $data = array();
          $data['args'] = array();
          $data['args']["password"] = json_encode($this->transport->object_unset_nulls($password));
          $data['args']["orderId"] = json_encode($this->transport->object_unset_nulls($orderId));
          $data['args']["currency"] = json_encode($this->transport->object_unset_nulls($currency));
          $data['args']["price"] = json_encode($this->transport->object_unset_nulls($price));
          $data['args']["status"] = json_encode($this->transport->object_unset_nulls($status));
          $data["method"] = "setOrderStatus";
          $data["interfaceName"] = "core.ordermanager.IOrderManager";
          return $this->transport->sendMessage($data);
     }

}
class APIPageManager {

      var $transport;

      function APIPageManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Add application
     * @param id
     * @return core_common_AppConfiguration
     * @throws ErrorException 
     */

     public function addApplication($applicationSettingId) {
          $data = array();
          $data['args'] = array();
          $data['args']["applicationSettingId"] = json_encode($this->transport->object_unset_nulls($applicationSettingId));
          $data["method"] = "addApplication";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * If you know the id of the application you want to add, we strongly recommend to use this call.
     * This function 
     * @param pageId The id of the page to add the application to
     * @param settingsId The settings id which identify what applications is being added.
     * @param pageArea The area this application should be added to.
     * @return core_common_AppConfiguration
     * @throws ErrorException 
     */

     public function addApplicationToPage($pageId, $applicationSettingId, $pageArea) {
          $data = array();
          $data['args'] = array();
          $data['args']["pageId"] = json_encode($this->transport->object_unset_nulls($pageId));
          $data['args']["applicationSettingId"] = json_encode($this->transport->object_unset_nulls($applicationSettingId));
          $data['args']["pageArea"] = json_encode($this->transport->object_unset_nulls($pageArea));
          $data["method"] = "addApplicationToPage";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Add an existing application to the application area
     * 
     * @param pageId
     * @param appId
     * @param area
     * @throws ErrorException 
     */

     public function addExistingApplicationToPageArea($pageId, $appId, $area) {
          $data = array();
          $data['args'] = array();
          $data['args']["pageId"] = json_encode($this->transport->object_unset_nulls($pageId));
          $data['args']["appId"] = json_encode($this->transport->object_unset_nulls($appId));
          $data['args']["area"] = json_encode($this->transport->object_unset_nulls($area));
          $data["method"] = "addExistingApplicationToPageArea";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Change the page layout<br>
     * HeaderFooterLeftMiddleRight = 1<br>
     * HeaderLeftMiddleFooter = 2<br>
     * HeaderRightMiddleFooter = 3<br>
     * HeaderMiddleFooter = 4<br>
     * 
     * @param pageId
     * @param layout
     * @throws ErrorException 
     */

     public function changePageLayout($pageId, $layout) {
          $data = array();
          $data['args'] = array();
          $data['args']["pageId"] = json_encode($this->transport->object_unset_nulls($pageId));
          $data['args']["layout"] = json_encode($this->transport->object_unset_nulls($layout));
          $data["method"] = "changePageLayout";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Change the userlevel for a given page. Make it accessible for only administrators / editors / customers.<br>
     * Everyone with a higher userlevel will allways gain access to the userlevels below.
     * @param pageId The id of the page to change.
     * @param userLevel The userlevel to set ADMINISTRATOR = 100, EDITOR = 50, CUSTOMER = 10
     * @return core_pagemanager_data_Page
     * @throws ErrorException 
     */

     public function changePageUserLevel($pageId, $userLevel) {
          $data = array();
          $data['args'] = array();
          $data['args']["pageId"] = json_encode($this->transport->object_unset_nulls($pageId));
          $data['args']["userLevel"] = json_encode($this->transport->object_unset_nulls($userLevel));
          $data["method"] = "changePageUserLevel";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->cast(API::core_pagemanager_data_Page(), $this->transport->sendMessage($data));
     }

     /**
     * Remove all applications for specified page area at specified page.
     * 
     * @param pageId
     * @throws ErrorException 
     */

     public function clearPageArea($pageId, $pageArea) {
          $data = array();
          $data['args'] = array();
          $data['args']["pageId"] = json_encode($this->transport->object_unset_nulls($pageId));
          $data['args']["pageArea"] = json_encode($this->transport->object_unset_nulls($pageArea));
          $data["method"] = "clearPageArea";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Create a new page.
     * This page can be used to stick applications to it.
     * 
     * Layout parameters<br>
     * Header footer left middle right = 1;<br>
     * Header left middle footer = 2;<br>
     * Header right middle footer = 3;<br>
     * Header middle footer = 4;<br>
     * 
     * @param layout See above, integer 1 to 4
     * @param parentId The parent page. From what page are this page being created?
     * @return core_pagemanager_data_Page
     * @throws ErrorException 
     */

     public function createPage($layout, $parentId) {
          $data = array();
          $data['args'] = array();
          $data['args']["layout"] = json_encode($this->transport->object_unset_nulls($layout));
          $data['args']["parentId"] = json_encode($this->transport->object_unset_nulls($parentId));
          $data["method"] = "createPage";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->cast(API::core_pagemanager_data_Page(), $this->transport->sendMessage($data));
     }

     /**
     * Create a new page with the specified id.
     * For layouts available, see layouts for createPage function
     * 
     * @param id
     * @return core_pagemanager_data_Page
     */

     public function createPageWithId($layout, $parentId, $id) {
          $data = array();
          $data['args'] = array();
          $data['args']["layout"] = json_encode($this->transport->object_unset_nulls($layout));
          $data['args']["parentId"] = json_encode($this->transport->object_unset_nulls($parentId));
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "createPageWithId";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->cast(API::core_pagemanager_data_Page(), $this->transport->sendMessage($data));
     }

     /**
     * Delete an application from the store
     * removes all references where it has been used.
     * 
     * Suitable for singleton applications
     * 
     * @param id
     * @throws ErrorException 
     */

     public function deleteApplication($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "deleteApplication";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Delete the page with the id.
     * 
     * @param id 
     */

     public function deletePage($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "deletePage";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch all settings for a given application
     * @param name The php equivelent name of the application.
     * @return HashMap
     * @throws ErrorException 
     */

     public function getApplicationSettings($name) {
          $data = array();
          $data['args'] = array();
          $data['args']["name"] = json_encode($this->transport->object_unset_nulls($name));
          $data["method"] = "getApplicationSettings";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Get all applications from the applicationPool.
     * 
     * @return List
     */

     public function getApplications() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getApplications";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Get all applications from the applicationPool. 
     * based on the specified ApplicationSettingsId
     * 
     * @return List
     */

     public function getApplicationsBasedOnApplicationSettingsId($appSettingsId) {
          $data = array();
          $data['args'] = array();
          $data['args']["appSettingsId"] = json_encode($this->transport->object_unset_nulls($appSettingsId));
          $data["method"] = "getApplicationsBasedOnApplicationSettingsId";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Get all applications from the applicationPool. 
     * based on the specified ApplicationSettingsId
     * 
     * @return List
     */

     public function getApplicationsByPageAreaAndSettingsId($appSettingsId, $pageArea) {
          $data = array();
          $data['args'] = array();
          $data['args']["appSettingsId"] = json_encode($this->transport->object_unset_nulls($appSettingsId));
          $data['args']["pageArea"] = json_encode($this->transport->object_unset_nulls($pageArea));
          $data["method"] = "getApplicationsByPageAreaAndSettingsId";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch all application from the applicationPool (added applications) which has a given type.
     * @param type
     * @return List
     * @throws ErrorException 
     */

     public function getApplicationsByType($type) {
          $data = array();
          $data['args'] = array();
          $data['args']["type"] = json_encode($this->transport->object_unset_nulls($type));
          $data["method"] = "getApplicationsByType";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Get all applications that is needed to render a page.
     * 
     * @param pageId
     * @return List
     * @throws ErrorException 
     */

     public function getApplicationsForPage($pageId) {
          $data = array();
          $data['args'] = array();
          $data['args']["pageId"] = json_encode($this->transport->object_unset_nulls($pageId));
          $data["method"] = "getApplicationsForPage";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * fetch an existing page.
     * @param id The id for the page to fetch.
     * @return core_pagemanager_data_Page
     * @throws ErrorException 
     */

     public function getPage($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "getPage";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->cast(API::core_pagemanager_data_Page(), $this->transport->sendMessage($data));
     }

     /**
     * Fetch a list of all pages found for a list of applications.<br>
     * The key is the application id, the list combined with the key a list of page ids found for the specified applications.
     * @param appIds A list of application ids to resolve pages for.
     * @throws ErrorException 
     */

     public function getPagesForApplications($appIds) {
          $data = array();
          $data['args'] = array();
          $data['args']["appIds"] = json_encode($this->transport->object_unset_nulls($appIds));
          $data["method"] = "getPagesForApplications";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch all settings for a given application
     * @param name The php equivelent name of the application.
     * @return HashMap
     * @throws ErrorException 
     */

     public function getSecuredSettings($appName) {
          $data = array();
          $data['args'] = array();
          $data['args']["appName"] = json_encode($this->transport->object_unset_nulls($appName));
          $data["method"] = "getSecuredSettings";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Remove instances of applications added for a specific page id.
     * @param appSettingsId The id of the application row
     * @throws ErrorException 
     */

     public function removeAllApplications($appSettingsId) {
          $data = array();
          $data['args'] = array();
          $data['args']["appSettingsId"] = json_encode($this->transport->object_unset_nulls($appSettingsId));
          $data["method"] = "removeAllApplications";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Remove an application
     * 
     * @param applicationId The id to the application.
     * @return core_pagemanager_data_Page
     * @throws ErrorException 
     */

     public function removeApplication($applicationId, $pageid) {
          $data = array();
          $data['args'] = array();
          $data['args']["applicationId"] = json_encode($this->transport->object_unset_nulls($applicationId));
          $data['args']["pageid"] = json_encode($this->transport->object_unset_nulls($pageid));
          $data["method"] = "removeApplication";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->cast(API::core_pagemanager_data_Page(), $this->transport->sendMessage($data));
     }

     /**
     * Rearrange a given application for a given page.
     * @param pageId The id of the page where the application is located.
     * @param appId The id of application id to rearrange.
     * @param moveUp If set to true the application is moved up, otherwhise it is set to false.
     * @return core_pagemanager_data_Page
     * @throws ErrorException 
     */

     public function reorderApplication($pageId, $appId, $moveUp) {
          $data = array();
          $data['args'] = array();
          $data['args']["pageId"] = json_encode($this->transport->object_unset_nulls($pageId));
          $data['args']["appId"] = json_encode($this->transport->object_unset_nulls($appId));
          $data['args']["moveUp"] = json_encode($this->transport->object_unset_nulls($moveUp));
          $data["method"] = "reorderApplication";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->cast(API::core_pagemanager_data_Page(), $this->transport->sendMessage($data));
     }

     /**
     * For each instance of the application, there is an configuration object attached.<br>
     * Modify this object to set an application sticky, inheritable etc.
     * @param config The appconfiguration object to update / save.
     * @throws ErrorException 
     */

     public function saveApplicationConfiguration($core_common_AppConfiguration) {
          $data = array();
          $data['args'] = array();
          $data['args']["core_common_AppConfiguration"] = json_encode($this->transport->object_unset_nulls($core_common_AppConfiguration));
          $data["method"] = "saveApplicationConfiguration";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Set a given set of settings to a given application.
     * @param settings The settings for the application.
     * @throws ErrorException 
     */

     public function setApplicationSettings($core_common_Settings) {
          $data = array();
          $data['args'] = array();
          $data['args']["core_common_Settings"] = json_encode($this->transport->object_unset_nulls($core_common_Settings));
          $data["method"] = "setApplicationSettings";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Stick an application. This means that the application will be visible on all the pages.<br>
     * This is especially useful for top menu application, footer applications, and other application<br>
     * that is supposed to be displayed all the time.
     * <br>
     * <br> 1 = sticked
     * <br> 0 = not sticked
     * @param appId The id of the application to stick.
     * @param toggle True makes the application sticky, false disabled the stickyness.
     * @throws ErrorException 
     */

     public function setApplicationSticky($appId, $toggle) {
          $data = array();
          $data['args'] = array();
          $data['args']["appId"] = json_encode($this->transport->object_unset_nulls($appId));
          $data['args']["toggle"] = json_encode($this->transport->object_unset_nulls($toggle));
          $data["method"] = "setApplicationSticky";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Set the page description.
     * @param description The description to add.
     * @param pageId The id of the page.
     * @throws ErrorException 
     */

     public function setPageDescription($pageId, $description) {
          $data = array();
          $data['args'] = array();
          $data['args']["pageId"] = json_encode($this->transport->object_unset_nulls($pageId));
          $data['args']["description"] = json_encode($this->transport->object_unset_nulls($description));
          $data["method"] = "setPageDescription";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Update a page and give it a parent page. <br>
     * This is used to figure out a hiarcy for the menues.<br>
     * @param pageId The page to have a parent page.
     * @param parentPageId The id of the page to be set as the parent page.
     * @throws ErrorException 
     */

     public function setParentPage($pageId, $parentPageId) {
          $data = array();
          $data['args'] = array();
          $data['args']["pageId"] = json_encode($this->transport->object_unset_nulls($pageId));
          $data['args']["parentPageId"] = json_encode($this->transport->object_unset_nulls($parentPageId));
          $data["method"] = "setParentPage";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * If you clone an application, you would prefer to switch all already added applications
     * into an existing application.
     * @param fromAppId
     * @param toAppId
     * @throws ErrorException 
     */

     public function swapApplication($fromAppId, $toAppId) {
          $data = array();
          $data['args'] = array();
          $data['args']["fromAppId"] = json_encode($this->transport->object_unset_nulls($fromAppId));
          $data['args']["toAppId"] = json_encode($this->transport->object_unset_nulls($toAppId));
          $data["method"] = "swapApplication";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Need to translate a set of page ids?
     * @param pages A list (array) of page ids to translate.
     * @return HashMap
     * @throws ErrorException 
     */

     public function translatePages($pages) {
          $data = array();
          $data['args'] = array();
          $data['args']["pages"] = json_encode($this->transport->object_unset_nulls($pages));
          $data["method"] = "translatePages";
          $data["interfaceName"] = "core.pagemanager.IPageManager";
          return $this->transport->sendMessage($data);
     }

}
class APIProductManager {

      var $transport;

      function APIProductManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Add an attribute to a product.
     * @param productId The id of the product to attach it to.
     * @param attributeGroup The name of the attribute group, if it does not exists, it is being added to the attribute pool.
     * @param attribute The name of the attribute, leave this empty to create a new attribute group.
     * @throws ErrorException 
     */

     public function addAttributeGroupToProduct($productId, $attributeGroup, $attribute) {
          $data = array();
          $data['args'] = array();
          $data['args']["productId"] = json_encode($this->transport->object_unset_nulls($productId));
          $data['args']["attributeGroup"] = json_encode($this->transport->object_unset_nulls($attributeGroup));
          $data['args']["attribute"] = json_encode($this->transport->object_unset_nulls($attribute));
          $data["method"] = "addAttributeGroupToProduct";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * add image to specified product
     * 
     * @param productId
     * @param productImageId
     * @param description
     * @throws ErrorException 
     */

     public function addImage($productId, $productImageId, $description) {
          $data = array();
          $data['args'] = array();
          $data['args']["productId"] = json_encode($this->transport->object_unset_nulls($productId));
          $data['args']["productImageId"] = json_encode($this->transport->object_unset_nulls($productImageId));
          $data['args']["description"] = json_encode($this->transport->object_unset_nulls($description));
          $data["method"] = "addImage";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * You can use this function to change the stock quantity for a given product
     * 
     * @param productId The id for the product to change.
     * @param count Number of entries to substract from the product stock quantity, an be negative number to decrease the stock quantity.
     * @return void
     * @throws ErrorException 
     */

     public function changeStockQuantity($productId, $count) {
          $data = array();
          $data['args'] = array();
          $data['args']["productId"] = json_encode($this->transport->object_unset_nulls($productId));
          $data['args']["count"] = json_encode($this->transport->object_unset_nulls($count));
          $data["method"] = "changeStockQuantity";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Create a new product instance.
     * @return core_productmanager_data_Product
     * @throws ErrorException 
     */

     public function createProduct() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "createProduct";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->cast(API::core_productmanager_data_Product(), $this->transport->sendMessage($data));
     }

     /**
     * I have an attribute attached to a group, but it does not seems to be in use, and i want to delete it.
     * @param groupName The name of the group where the attribute is located.
     * @param attribute The name of the attribute to remove.
     * @throws ErrorException 
     */

     public function deleteAttribute($groupName, $attribute) {
          $data = array();
          $data['args'] = array();
          $data['args']["groupName"] = json_encode($this->transport->object_unset_nulls($groupName));
          $data['args']["attribute"] = json_encode($this->transport->object_unset_nulls($attribute));
          $data["method"] = "deleteAttribute";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * This attribute is not even in use, I want to delete it.
     * @param groupName The name of the group to delete.
     * @throws ErrorException 
     */

     public function deleteGroup($groupName) {
          $data = array();
          $data['args'] = array();
          $data['args']["groupName"] = json_encode($this->transport->object_unset_nulls($groupName));
          $data["method"] = "deleteGroup";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Whenever you use the getproducts function call, you will be able to fetch a summary of the attributes.
     * Comes in handy to filter result when fetching data from for example a product list.
     * @return core_productmanager_data_AttributeSummary
     * @throws ErrorException 
     */

     public function getAttributeSummary() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getAttributeSummary";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->cast(API::core_productmanager_data_AttributeSummary(), $this->transport->sendMessage($data));
     }

     /**
     * Fetch a list of all the latest products.
     * @param count Number of products to fetch.
     * @return List
     * @throws ErrorException 
     */

     public function getLatestProducts($count) {
          $data = array();
          $data['args'] = array();
          $data['args']["count"] = json_encode($this->transport->object_unset_nulls($count));
          $data["method"] = "getLatestProducts";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Get price for a product with variations
     */

     public function getPrice($productId, $variations) {
          $data = array();
          $data['args'] = array();
          $data['args']["productId"] = json_encode($this->transport->object_unset_nulls($productId));
          $data['args']["variations"] = json_encode($this->transport->object_unset_nulls($variations));
          $data["method"] = "getPrice";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch one single product by id
     * 
     * @param id
     * @return core_productmanager_data_Product
     * @throws ErrorException 
     */

     public function getProduct($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "getProduct";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->cast(API::core_productmanager_data_Product(), $this->transport->sendMessage($data));
     }

     /**
     * Find the product uuid set for an application.
     * @param uuid
     * @return core_productmanager_data_Product
     * @throws ErrorException 
     */

     public function getProductFromApplicationId($app_uuid) {
          $data = array();
          $data['args'] = array();
          $data['args']["app_uuid"] = json_encode($this->transport->object_unset_nulls($app_uuid));
          $data["method"] = "getProductFromApplicationId";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->cast(API::core_productmanager_data_Product(), $this->transport->sendMessage($data));
     }

     /**
     * Fetch products 
     * 
     * @param productCriteria
     * @return List
     * @throws ErrorException 
     */

     public function getProducts($core_productmanager_data_ProductCriteria) {
          $data = array();
          $data['args'] = array();
          $data['args']["core_productmanager_data_ProductCriteria"] = json_encode($this->transport->object_unset_nulls($core_productmanager_data_ProductCriteria));
          $data["method"] = "getProducts";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Returns a random set of products
     * If the store does not have enough products it will return as close as possible to 
     * the fetchsize specified.
     * 
     * @param fetchSize Amount of products that you wish to fetch.
     * @param ignoreProductId Will skip this id, can be the productId or the productPageId.
     * @return ArrayList
     */

     public function getRandomProducts($fetchSize, $ignoreProductId) {
          $data = array();
          $data['args'] = array();
          $data['args']["fetchSize"] = json_encode($this->transport->object_unset_nulls($fetchSize));
          $data['args']["ignoreProductId"] = json_encode($this->transport->object_unset_nulls($ignoreProductId));
          $data["method"] = "getRandomProducts";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Oh, so you added an attribute to a product which where not ment to be?
     * @param productId The id of the product.
     * @param attributeGroupId The id for the product group attached.
     */

     public function removeAttributeGroupFromProduct($productId, $attributeGroupId) {
          $data = array();
          $data['args'] = array();
          $data['args']["productId"] = json_encode($this->transport->object_unset_nulls($productId));
          $data['args']["attributeGroupId"] = json_encode($this->transport->object_unset_nulls($attributeGroupId));
          $data["method"] = "removeAttributeGroupFromProduct";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Remove an existing product.
     * 
     * @param productId The id of the product to remove.
     * @return void
     * @throws ErrorException 
     */

     public function removeProduct($productId) {
          $data = array();
          $data['args'] = array();
          $data['args']["productId"] = json_encode($this->transport->object_unset_nulls($productId));
          $data["method"] = "removeProduct";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Oh, I incorrectly wrote my attribute, i need to rename it for a specific group.
     * @param groupName The name of the group where the attribute is located.
     * @param oldAttributeName The old attribute text
     * @param newAttributeName The new attribute text.
     * @throws ErrorException 
     */

     public function renameAttribute($groupName, $oldAttributeName, $newAttributeName) {
          $data = array();
          $data['args'] = array();
          $data['args']["groupName"] = json_encode($this->transport->object_unset_nulls($groupName));
          $data['args']["oldAttributeName"] = json_encode($this->transport->object_unset_nulls($oldAttributeName));
          $data['args']["newAttributeName"] = json_encode($this->transport->object_unset_nulls($newAttributeName));
          $data["method"] = "renameAttribute";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Typically, i just enter in incorrect group name, and i just figured it out... :(<br>
     * Well, this one helps you.
     * @param oldName The old group name.
     * @param newName The new group name.
     * @throws ErrorException 
     */

     public function renameAttributeGroupName($oldName, $newName) {
          $data = array();
          $data['args'] = array();
          $data['args']["oldName"] = json_encode($this->transport->object_unset_nulls($oldName));
          $data['args']["newName"] = json_encode($this->transport->object_unset_nulls($newName));
          $data["method"] = "renameAttributeGroupName";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Save a product.
     * 
     * @param product The product to save, if the id for the product is not set.
     * @param parentPageId Attach this product to a given page, leave this empty to avoid attaching it.
     * @return core_productmanager_data_Product
     * @throws ErrorException 
     */

     public function saveProduct($core_productmanager_data_Product) {
          $data = array();
          $data['args'] = array();
          $data['args']["core_productmanager_data_Product"] = json_encode($this->transport->object_unset_nulls($core_productmanager_data_Product));
          $data["method"] = "saveProduct";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->cast(API::core_productmanager_data_Product(), $this->transport->sendMessage($data));
     }

     /**
     * Method for setting a known product image as main image.
     * 
     * @param productId
     * @param imageId
     * @throws ErrorException 
     */

     public function setMainImage($productId, $imageId) {
          $data = array();
          $data['args'] = array();
          $data['args']["productId"] = json_encode($this->transport->object_unset_nulls($productId));
          $data['args']["imageId"] = json_encode($this->transport->object_unset_nulls($imageId));
          $data["method"] = "setMainImage";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Translate all antries found in a given list of entry ids.
     * @param entryIds A list of entries id to translate.
     * @return HashMap
     * @throws ErrorException 
     */

     public function translateEntries($entryIds) {
          $data = array();
          $data['args'] = array();
          $data['args']["entryIds"] = json_encode($this->transport->object_unset_nulls($entryIds));
          $data["method"] = "translateEntries";
          $data["interfaceName"] = "core.productmanager.IProductManager";
          return $this->transport->sendMessage($data);
     }

}
class APIReportingManager {

      var $transport;

      function APIReportingManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Fetch all activity data for a given session at a given period in time.
     * @param startDate "yyyy-mm-dd"
     * @param stopDate "yyyy-mm-dd"
     * @param searchSessionId The id of the session to fetch data from.
     * @return List
     * @throws ErrorException 
     */

     public function getAllEventsFromSession($startDate, $stopDate, $searchSessionId) {
          $data = array();
          $data['args'] = array();
          $data['args']["startDate"] = json_encode($this->transport->object_unset_nulls($startDate));
          $data['args']["stopDate"] = json_encode($this->transport->object_unset_nulls($stopDate));
          $data['args']["searchSessionId"] = json_encode($this->transport->object_unset_nulls($searchSessionId));
          $data["method"] = "getAllEventsFromSession";
          $data["interfaceName"] = "core.reportingmanager.IReportingManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch all users which connected at a given time period.
     * These are users who has been logging on to your store.
     * @param startdate "yyyy-mm-dd"
     * @param stopDate "yyyy-mm-dd"
     * @param filter A report filter if you want to filter out more information, use null to avoid the filter.
     * @return List
     * @throws ErrorException 
     */

     public function getConnectedUsers($startdate, $stopDate, $core_reportingmanager_data_ReportFilter) {
          $data = array();
          $data['args'] = array();
          $data['args']["startdate"] = json_encode($this->transport->object_unset_nulls($startdate));
          $data['args']["stopDate"] = json_encode($this->transport->object_unset_nulls($stopDate));
          $data['args']["core_reportingmanager_data_ReportFilter"] = json_encode($this->transport->object_unset_nulls($core_reportingmanager_data_ReportFilter));
          $data["method"] = "getConnectedUsers";
          $data["interfaceName"] = "core.reportingmanager.IReportingManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * List all orders created at a given time period.
     * @param startDate "yyyy-mm-dd"
     * @param stopDate "yyyy-mm-dd"
     * @return List
     * @throws ErrorException 
     */

     public function getOrdersCreated($startDate, $stopDate) {
          $data = array();
          $data['args'] = array();
          $data['args']["startDate"] = json_encode($this->transport->object_unset_nulls($startDate));
          $data['args']["stopDate"] = json_encode($this->transport->object_unset_nulls($stopDate));
          $data["method"] = "getOrdersCreated";
          $data["interfaceName"] = "core.reportingmanager.IReportingManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch the page id for all page 
     * @param startDate "yyyy-mm-dd"
     * @param stopDate "yyyy-mm-dd"
     * @return List
     * @throws ErrorException 
     */

     public function getPageViews($startDate, $stopDate) {
          $data = array();
          $data['args'] = array();
          $data['args']["startDate"] = json_encode($this->transport->object_unset_nulls($startDate));
          $data['args']["stopDate"] = json_encode($this->transport->object_unset_nulls($stopDate));
          $data["method"] = "getPageViews";
          $data["interfaceName"] = "core.reportingmanager.IReportingManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch all viewed product for a given time period.
     * @param startDate "yyyy-mm-dd"
     * @param stopDate "yyyy-mm-dd"
     * @return List
     * @throws ErrorException 
     */

     public function getProductViewed($startDate, $stopDate) {
          $data = array();
          $data['args'] = array();
          $data['args']["startDate"] = json_encode($this->transport->object_unset_nulls($startDate));
          $data['args']["stopDate"] = json_encode($this->transport->object_unset_nulls($stopDate));
          $data["method"] = "getProductViewed";
          $data["interfaceName"] = "core.reportingmanager.IReportingManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch a report for a given time period.
     * @param startDate "yyyy-mm-dd"
     * @param stopDate "yyyy-mm-dd"
     * @param type 0, hourly, 1. daily, 2. weekly, 3. monthly
     * @return List
     * @throws ErrorException 
     */

     public function getReport($startDate, $stopDate, $type) {
          $data = array();
          $data['args'] = array();
          $data['args']["startDate"] = json_encode($this->transport->object_unset_nulls($startDate));
          $data['args']["stopDate"] = json_encode($this->transport->object_unset_nulls($stopDate));
          $data['args']["type"] = json_encode($this->transport->object_unset_nulls($type));
          $data["method"] = "getReport";
          $data["interfaceName"] = "core.reportingmanager.IReportingManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch a list of all users trying / logging on at a given time interval.
     * @param startDate "yyyy-mm-dd"
     * @param stopDate "yyyy-mm-dd"
     * @return List
     * @throws ErrorException 
     */

     public function getUserLoggedOn($startDate, $stopDate) {
          $data = array();
          $data['args'] = array();
          $data['args']["startDate"] = json_encode($this->transport->object_unset_nulls($startDate));
          $data['args']["stopDate"] = json_encode($this->transport->object_unset_nulls($stopDate));
          $data["method"] = "getUserLoggedOn";
          $data["interfaceName"] = "core.reportingmanager.IReportingManager";
          return $this->transport->sendMessage($data);
     }

}
class APIStoreManager {

      var $transport;

      function APIStoreManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Create a new store / webshop with a given name.
     * @param hostname The hostname to the webshop.
     * @param email The email to identify the first user with,
     * @param password The password to logon the first user added to this webshop.
     * @return core_storemanager_data_Store
     * @throws ErrorException 
     */

     public function createStore($hostname, $email, $password) {
          $data = array();
          $data['args'] = array();
          $data['args']["hostname"] = json_encode($this->transport->object_unset_nulls($hostname));
          $data['args']["email"] = json_encode($this->transport->object_unset_nulls($email));
          $data['args']["password"] = json_encode($this->transport->object_unset_nulls($password));
          $data["method"] = "createStore";
          $data["interfaceName"] = "core.storemanager.IStoreManager";
          return $this->transport->cast(API::core_storemanager_data_Store(), $this->transport->sendMessage($data));
     }

     /**
     * Enable extended support for this webshop.
     * Extended mode is a more advanced version of the ui where there is no limitation to what can be created / made.
     * @param toggle True or false depending if this webshop should have access to the extended mode.
     * @param password A password given by getshop to toggle this option.
     * @return void
     * @throws ErrorException 
     */

     public function delete() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "delete";
          $data["interfaceName"] = "core.storemanager.IStoreManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Enable extended support for this webshop.
     * Extended mode is a more advanced version of the ui where there is no limitation to what can be created / made.
     * @param toggle True or false depending if this webshop should have access to the extended mode.
     * @param password A password given by getshop to toggle this option.
     * @return core_storemanager_data_Store
     * @throws ErrorException 
     */

     public function enableExtendedMode($toggle, $password) {
          $data = array();
          $data['args'] = array();
          $data['args']["toggle"] = json_encode($this->transport->object_unset_nulls($toggle));
          $data['args']["password"] = json_encode($this->transport->object_unset_nulls($password));
          $data["method"] = "enableExtendedMode";
          $data["interfaceName"] = "core.storemanager.IStoreManager";
          return $this->transport->cast(API::core_storemanager_data_Store(), $this->transport->sendMessage($data));
     }

     /**
     * Enable support to send sms for this webshop.
     * This option is not free since there is a cost for each sms sent.
     * @param toggle true or false depending on if this webshop should have access to sms.
     * @param password A password given by getshop to toggle this option.
     * @return core_storemanager_data_Store
     * @throws ErrorException 
     */

     public function enableSMSAccess($toggle, $password) {
          $data = array();
          $data['args'] = array();
          $data['args']["toggle"] = json_encode($this->transport->object_unset_nulls($toggle));
          $data['args']["password"] = json_encode($this->transport->object_unset_nulls($password));
          $data["method"] = "enableSMSAccess";
          $data["interfaceName"] = "core.storemanager.IStoreManager";
          return $this->transport->cast(API::core_storemanager_data_Store(), $this->transport->sendMessage($data));
     }

     /**
     * Get the store added to this session.
     * @return core_storemanager_data_Store
     * @throws ErrorException 
     */

     public function getMyStore() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getMyStore";
          $data["interfaceName"] = "core.storemanager.IStoreManager";
          return $this->transport->cast(API::core_storemanager_data_Store(), $this->transport->sendMessage($data));
     }

     /**
     * Fetch the store id identified to this user.
     * @return String
     * @throws ErrorException 
     */

     public function getStoreId() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getStoreId";
          $data["interfaceName"] = "core.storemanager.IStoreManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Initializing this api. This will identify the webshop and will act as the root for everything in this api.
     * @param initSessionId The session id to identify to this user.
     * @return core_storemanager_data_Store
     * @throws ErrorException 
     */

     public function initializeStore($webAddress, $initSessionId) {
          $data = array();
          $data['args'] = array();
          $data['args']["webAddress"] = json_encode($this->transport->object_unset_nulls($webAddress));
          $data['args']["initSessionId"] = json_encode($this->transport->object_unset_nulls($initSessionId));
          $data["method"] = "initializeStore";
          $data["interfaceName"] = "core.storemanager.IStoreManager";
          return $this->transport->cast(API::core_storemanager_data_Store(), $this->transport->sendMessage($data));
     }

     /**
     * Check if a web shop address has already been taken.
     * @param address The address to check for.
     * @throws ErrorException 
     */

     public function isAddressTaken($address) {
          $data = array();
          $data['args'] = array();
          $data['args']["address"] = json_encode($this->transport->object_unset_nulls($address));
          $data["method"] = "isAddressTaken";
          $data["interfaceName"] = "core.storemanager.IStoreManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Remove an already added domain name.
     * @param domainName The domain name to remove.
     * @return core_storemanager_data_Store
     * @throws ErrorException 
     */

     public function removeDomainName($domainName) {
          $data = array();
          $data['args'] = array();
          $data['args']["domainName"] = json_encode($this->transport->object_unset_nulls($domainName));
          $data["method"] = "removeDomainName";
          $data["interfaceName"] = "core.storemanager.IStoreManager";
          return $this->transport->cast(API::core_storemanager_data_Store(), $this->transport->sendMessage($data));
     }

     /**
     * Update the current store with new configuration data.
     * @param config The configuration data to update.
     * @return core_storemanager_data_Store
     * @throws ErrorException 
     */

     public function saveStore($core_storemanager_data_StoreConfiguration) {
          $data = array();
          $data['args'] = array();
          $data['args']["core_storemanager_data_StoreConfiguration"] = json_encode($this->transport->object_unset_nulls($core_storemanager_data_StoreConfiguration));
          $data["method"] = "saveStore";
          $data["interfaceName"] = "core.storemanager.IStoreManager";
          return $this->transport->cast(API::core_storemanager_data_Store(), $this->transport->sendMessage($data));
     }

     /**
     * This will set the readintroduction variable in the Store object to true.
     * @return core_storemanager_data_Store
     * @throws ErrorException 
     */

     public function setIntroductionRead() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "setIntroductionRead";
          $data["interfaceName"] = "core.storemanager.IStoreManager";
          return $this->transport->cast(API::core_storemanager_data_Store(), $this->transport->sendMessage($data));
     }

     /**
     * Set a new domain name to this store / webshop
     * @param domainName The domain name to identify this shop with.
     * @return core_storemanager_data_Store
     * @throws ErrorException 
     */

     public function setPrimaryDomainName($domainName) {
          $data = array();
          $data['args'] = array();
          $data['args']["domainName"] = json_encode($this->transport->object_unset_nulls($domainName));
          $data["method"] = "setPrimaryDomainName";
          $data["interfaceName"] = "core.storemanager.IStoreManager";
          return $this->transport->cast(API::core_storemanager_data_Store(), $this->transport->sendMessage($data));
     }

     /**
     * Is this a very important shop or not?
     * 
     * @param toggle True / False
     * @param password And internal password needed to toggle this option.
     * @throws ErrorException 
     */

     public function setVIS($toggle, $password) {
          $data = array();
          $data['args'] = array();
          $data['args']["toggle"] = json_encode($this->transport->object_unset_nulls($toggle));
          $data['args']["password"] = json_encode($this->transport->object_unset_nulls($password));
          $data["method"] = "setVIS";
          $data["interfaceName"] = "core.storemanager.IStoreManager";
          return $this->transport->sendMessage($data);
     }

}
class APIUserManager {

      var $transport;

      function APIUserManager($transport) {
           $this->transport = $transport;
      }

     /**
     * Create a new user to your webshop.<br>
     * This will fail if you are trying to create a user which is granted more access then you have yourself.<br>
     * If no users has been created, then the user object will automatically be set as an administrator.<br>
     * That is how you create your first user, set the User.type field to 0.
     * @param user The new user to be created. and the password is sent as plain text.
     * @return core_usermanager_data_User
     * @throws ErrorException 
     */

     public function createUser($core_usermanager_data_User) {
          $data = array();
          $data['args'] = array();
          $data['args']["core_usermanager_data_User"] = json_encode($this->transport->object_unset_nulls($core_usermanager_data_User));
          $data["method"] = "createUser";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->cast(API::core_usermanager_data_User(), $this->transport->sendMessage($data));
     }

     /**
     * Delete a registered user.
     * This will fail if you are trying to create a user which is granted more access then you have yourself.
     * @param userId The id for the user to delete.
     * @return void
     * @throws ErrorException 
     */

     public function deleteUser($userId) {
          $data = array();
          $data['args'] = array();
          $data['args']["userId"] = json_encode($this->transport->object_unset_nulls($userId));
          $data["method"] = "deleteUser";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Find all users with a given search criteria.
     * @param searchCriteria The criteria to search for
     * @return List
     * @throws ErrorException 
     */

     public function findUsers($searchCriteria) {
          $data = array();
          $data['args'] = array();
          $data['args']["searchCriteria"] = json_encode($this->transport->object_unset_nulls($searchCriteria));
          $data["method"] = "findUsers";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Gets the count of how many adminsitrators
     * is available for the page
     * @return int
     */

     public function getAdministratorCount() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getAdministratorCount";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Returns all the groups
     * that has been created for this
     * webpage.
     * 
     * @return List
     */

     public function getAllGroups() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getAllGroups";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch all the users registered to this webshop.
     * @return List
     * @throws ErrorException 
     */

     public function getAllUsers() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getAllUsers";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Gets the count of how many customers 
     * is available for the page
     * @return int
     */

     public function getCustomersCount() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getCustomersCount";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Gets the count of how many editors
     * is available for the page
     * @return int
     */

     public function getEditorCount() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getEditorCount";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Fetch the currently logged on user.
     * @return core_usermanager_data_User
     */

     public function getLoggedOnUser() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "getLoggedOnUser";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->cast(API::core_usermanager_data_User(), $this->transport->sendMessage($data));
     }

     /**
     * Fetch a user 
     * @param id
     * @return core_usermanager_data_User
     * @throws ErrorException 
     */

     public function getUserById($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "getUserById";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->cast(API::core_usermanager_data_User(), $this->transport->sendMessage($data));
     }

     /**
     * Fetch all users with the given user ids.
     * @param userIds A list of user ids.
     * @return List
     * @throws ErrorException 
     */

     public function getUserList($userIds) {
          $data = array();
          $data['args'] = array();
          $data['args']["userIds"] = json_encode($this->transport->object_unset_nulls($userIds));
          $data["method"] = "getUserList";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Check if the user is a real star trek hero!
     * @param id The id of the user to check on.
     * @return boolean
     * @throws ErrorException 
     */

     public function isCaptain($id) {
          $data = array();
          $data['args'] = array();
          $data['args']["id"] = json_encode($this->transport->object_unset_nulls($id));
          $data["method"] = "isCaptain";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Check if this session is logged on or not.
     * @return boolean
     * @throws ErrorException 
     */

     public function isLoggedIn() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "isLoggedIn";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Logon a given user.
     * @param email The username to use when logging on, an also be the users email.
     * @param password The password for this user in plain text.
     * @return core_usermanager_data_User
     * @throws ErrorException 
     */

     public function logOn($username, $password) {
          $data = array();
          $data['args'] = array();
          $data['args']["username"] = json_encode($this->transport->object_unset_nulls($username));
          $data['args']["password"] = json_encode($this->transport->object_unset_nulls($password));
          $data["method"] = "logOn";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->cast(API::core_usermanager_data_User(), $this->transport->sendMessage($data));
     }

     /**
     * Sometimes it is needed for someone to logon using a generated key instead.<br>
     * The key is unique and attached to the user trying to logon.<br>
     * Whenever someone logs on using the key,<br> it will automatically be removed, this it is only valid once.<br>
     * @param logonKey A unique key identifying the user which is trying to logon.
     * @return core_usermanager_data_User
     * @throws ErrorException 
     */

     public function logonUsingKey($logonKey) {
          $data = array();
          $data['args'] = array();
          $data['args']["logonKey"] = json_encode($this->transport->object_unset_nulls($logonKey));
          $data["method"] = "logonUsingKey";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->cast(API::core_usermanager_data_User(), $this->transport->sendMessage($data));
     }

     /**
     * Logout the currently logged on user.
     * @return void
     * @throws ErrorException 
     */

     public function logout() {
          $data = array();
          $data['args'] = array();
          $data["method"] = "logout";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Delete a specified group.
     * 
     * @param groupId
     * @throws ErrorException 
     */

     public function removeGroup($groupId) {
          $data = array();
          $data['args'] = array();
          $data['args']["groupId"] = json_encode($this->transport->object_unset_nulls($groupId));
          $data["method"] = "removeGroup";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * When the reset code has been sent, you can reset your password with the given reset code.
     * @param resetCode The code sent by sendResetCode call.
     * @param username The username for the user to update, the email address is the most common username.
     * @param newPassword The new password to send as plain text.
     * @return void
     * @throws ErrorException 
     */

     public function resetPassword($resetCode, $username, $newPassword) {
          $data = array();
          $data['args'] = array();
          $data['args']["resetCode"] = json_encode($this->transport->object_unset_nulls($resetCode));
          $data['args']["username"] = json_encode($this->transport->object_unset_nulls($username));
          $data['args']["newPassword"] = json_encode($this->transport->object_unset_nulls($newPassword));
          $data["method"] = "resetPassword";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Create a new group. 
     * A group is a way to collect all users
     * together. If an administrator belongs to a 
     * group, it will only be able to see/modify the
     * users that are within the same group.
     * 
     * @param groupName
     * @param imageId
     * @throws ErrorException 
     */

     public function saveGroup($core_usermanager_data_Group) {
          $data = array();
          $data['args'] = array();
          $data['args']["core_usermanager_data_Group"] = json_encode($this->transport->object_unset_nulls($core_usermanager_data_Group));
          $data["method"] = "saveGroup";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * Update a given user.<br>
     * This will fail if you are trying to update a user which is granted more access then you have yourself.
     * @param user You can not change the password, use updatePassword to change the password.
     * @return void
     * @throws ErrorException 
     */

     public function saveUser($core_usermanager_data_User) {
          $data = array();
          $data['args'] = array();
          $data['args']["core_usermanager_data_User"] = json_encode($this->transport->object_unset_nulls($core_usermanager_data_User));
          $data["method"] = "saveUser";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * If you need to reset the password for a given user, you need fetch a reset code by calling this call.
     * @param title The title of the message to attach to the reset code.
     * @param text The text to attach to the mail being sent with the reset code.
     * @param username The username to identify the user, the email address is the most common username.
     * @return void
     * @throws ErrorException 
     */

     public function sendResetCode($title, $text, $username) {
          $data = array();
          $data['args'] = array();
          $data['args']["title"] = json_encode($this->transport->object_unset_nulls($title));
          $data['args']["text"] = json_encode($this->transport->object_unset_nulls($text));
          $data['args']["username"] = json_encode($this->transport->object_unset_nulls($username));
          $data["method"] = "sendResetCode";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

     /**
     * 
     * @param userId The id for the user to modify.
     * @param oldPassword The old password as plain text, if you have a userlevel above, the oldpassword will be ignored.
     * @param newPassword The new password as plain text.
     * @throws ErrorException 
     */

     public function updatePassword($userId, $oldPassword, $newPassword) {
          $data = array();
          $data['args'] = array();
          $data['args']["userId"] = json_encode($this->transport->object_unset_nulls($userId));
          $data['args']["oldPassword"] = json_encode($this->transport->object_unset_nulls($oldPassword));
          $data['args']["newPassword"] = json_encode($this->transport->object_unset_nulls($newPassword));
          $data["method"] = "updatePassword";
          $data["interfaceName"] = "core.usermanager.IUserManager";
          return $this->transport->sendMessage($data);
     }

}
class GetShopApi {

      var $transport;
      function GetShopApi($port, $host="localhost") {
           $this->transport = new CommunicationHelper();
           $this->transport->port = $port;
           $this->transport->host = $host;
           $this->transport->connect();
      }
     /**
      * @return BannerManager
      */
      public function getBannerManager() {
           return new APIBannerManager($this->transport);
      }
     /**
      * @return ContentManager
      */
      public function getContentManager() {
           return new APIContentManager($this->transport);
      }
     /**
      * @return FooterManager
      */
      public function getFooterManager() {
           return new APIFooterManager($this->transport);
      }
     /**
      * @return LogoManager
      */
      public function getLogoManager() {
           return new APILogoManager($this->transport);
      }
     /**
      * @return NewsManager
      */
      public function getNewsManager() {
           return new APINewsManager($this->transport);
      }
     /**
      * @return AppManager
      */
      public function getAppManager() {
           return new APIAppManager($this->transport);
      }
     /**
      * @return CalendarManager
      */
      public function getCalendarManager() {
           return new APICalendarManager($this->transport);
      }
     /**
      * @return CartManager
      */
      public function getCartManager() {
           return new APICartManager($this->transport);
      }
     /**
      * @return ChatManager
      */
      public function getChatManager() {
           return new APIChatManager($this->transport);
      }
     /**
      * @return GalleryManager
      */
      public function getGalleryManager() {
           return new APIGalleryManager($this->transport);
      }
     /**
      * @return GetShop
      */
      public function getGetShop() {
           return new APIGetShop($this->transport);
      }
     /**
      * @return ListManager
      */
      public function getListManager() {
           return new APIListManager($this->transport);
      }
     /**
      * @return MessageManager
      */
      public function getMessageManager() {
           return new APIMessageManager($this->transport);
      }
     /**
      * @return OrderManager
      */
      public function getOrderManager() {
           return new APIOrderManager($this->transport);
      }
     /**
      * @return PageManager
      */
      public function getPageManager() {
           return new APIPageManager($this->transport);
      }
     /**
      * @return ProductManager
      */
      public function getProductManager() {
           return new APIProductManager($this->transport);
      }
     /**
      * @return ReportingManager
      */
      public function getReportingManager() {
           return new APIReportingManager($this->transport);
      }
     /**
      * @return StoreManager
      */
      public function getStoreManager() {
           return new APIStoreManager($this->transport);
      }
     /**
      * @return UserManager
      */
      public function getUserManager() {
           return new APIUserManager($this->transport);
      }
}
?>