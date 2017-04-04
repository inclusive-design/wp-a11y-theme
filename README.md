# FLOE Project Wordpress a11y Theme

An accessible, responsive Wordpress theme created by the Floe Project. The theme features a static front page which displays a prominent description, and three content panels. The main navigation can display content landing pages, giving visitors a spot to orient themselves before diving deeper into the content.

## Installation

1. Copy this theme into a sub-directory in your Wordpress `themes` directory.
2. Download and install the [UI Options Wordpress plugin](https://github.com/fluid-project/uio-wordpress-plugin) into your Wordpress `plugins` directory. Note: This plugin is required.
3. Activate the `a11y` theme.

## Information Structure

Before configuring the website, have a general idea of how the information will be structured. For this documentation, we will use a fictitious "A1 Renovations" construction company as a model. Their website will have the following structure:

* Showcase
    * Basements
    * Kitchens
    * Bathrooms
    * Entertainment
* Services
    * Design
    * Home Inspections
    * Renovations
    * Design and Build
* Contact
* About

## Identify Categories and Landing pages

Based on the information structure above, we can create two categories: "Showcase", and "Services". Under these categories we can create individual posts like "Basements" and "Kitchens".

The `a11y` theme has a feature which allows you to display a custom landing page for any category. This way, rather than the default Wordpress listing of posts, we can display some other meaningful content instead.

## Create the Categories
In the Wordpress Admin dashboard, go to `Posts` > `Categories`, and add the categories you need.

In our example, we will add the categories `Showcase` and `Services`.

## Create Some Posts and the Landing Pages
To demonstrate how the category landing pages work, we will create some sample posts and an associate landing page.

*Create some sample posts*
1. Create two new posts: `Kitchens` and `Basements`.
2. Assign each of these new posts to the `Showcase` category.

*Create the landing page*
1. Create another new post - this one will be the landing page for the `Showcase` category.
2. Give it a title that can be easily identified. This title will not be displayed, but used as a way to find it in the WP dashboard. In our example, we created: `Showcase landing page`.
3. Assign the landing page to the category it belongs to. i.e. `Showcase`.
4. Add a Custom Field called `is_landing_page` and give it a value of `true`. Note, to enable Custom Fields, please visit [Custom Fields on the Wordpress Codex](https://codex.wordpress.org/Custom_Fields#Usage).
5. Save your changes by selecting `Publish`.
6. Repeat steps 1 to 5 for every langing page you need.

## Setting up the Navigation

Now if you view your site, it won't look much different. That's because the navigation hasn't been set up yet.

1. In the Dashboard, go to `Appearance` > `Menus`
2. Create a new menu. Give it a name and select `Create Menu`.
3. Under the `Categories` option in the chooser, select the categories you want to appear in the main navigation. In our example, choose `Showcase`.
4. Under `Display location`, select `Primary Menu`.
5. Select `Save Menu`.

Now if you refresh the site, you should now see the navigation along the top. If you select your category, the landing page should appear along with the sub-pages listed in the sidebar navigation.

## Configuring the Three Panels on the front Page

Another feature of the a11y theme is the three content panels on the front page. The content of these panels are populated from any 3 posts or pages in your site. The titles and image thumbnails (if of the post / page has a Featured Image) can also link to any content within your site.

To set this up:

1. In the Dashboard go to `Appearance` > `a11y Theme Options`
2. Under `Front Panel Content` enter in the IDs of the 3 posts or pages to appear within the panels.
3. Under `Front Panel Links` enter the address the title and thumbnail should link to. The address should belong to the website.

# About

The `a11y` theme is created and maintained by the [FLOE Project](http://www.floeproject.org/).
