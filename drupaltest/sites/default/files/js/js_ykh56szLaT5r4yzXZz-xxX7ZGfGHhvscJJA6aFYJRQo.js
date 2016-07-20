
/*
 * jQuery treeTable Plugin 2.3.0
 * http://ludo.cubicphuse.nl/jquery-plugins/treeTable/
 *
 * Copyright 2010, Ludo van den Boom
 * Dual licensed under the MIT or GPL Version 2 licenses.
 */
(function($) {
  // Helps to make options available to all functions
  // TODO: This gives problems when there are both expandable and non-expandable
  // trees on a page. The options shouldn't be global to all these instances!
  var options;
  var defaultPaddingLeft;

  $.fn.treeTable = function(opts) {
    options = $.extend({}, $.fn.treeTable.defaults, opts);

    return this.each(function() {
      $(this).addClass("treeTable").find("tbody tr").each(function() {
        // Initialize root nodes only if possible
        if(!options.expandable || $(this)[0].className.search(options.childPrefix) == -1) {
          // To optimize performance of indentation, I retrieve the padding-left
          // value of the first root node. This way I only have to call +css+
          // once.
          if (isNaN(defaultPaddingLeft)) {
            defaultPaddingLeft = parseInt($($(this).children("td")[options.treeColumn]).css('padding-left'), 10);
          }

          initialize($(this));
        } else if(options.initialState == "collapsed") {
          this.style.display = "none"; // Performance! $(this).hide() is slow...
        }
      });
    });
  };

  $.fn.treeTable.defaults = {
    childPrefix: "child-of-",
    clickableNodeNames: false,
    expandable: true,
    indent: 19,
    initialState: "collapsed",
    treeColumn: 0
  };

  // Recursively hide all node's children in a tree
  $.fn.collapse = function() {
    $(this).addClass("collapsed");

    childrenOf($(this)).each(function() {
      if(!$(this).hasClass("collapsed")) {
        $(this).collapse();
      }

      this.style.display = "none"; // Performance! $(this).hide() is slow...
    });

    return this;
  };

  // Recursively show all node's children in a tree
  $.fn.expand = function() {
    $(this).removeClass("collapsed").addClass("expanded");

    childrenOf($(this)).each(function() {
      initialize($(this));

      if($(this).is(".expanded.parent")) {
        $(this).expand();
      }

      // this.style.display = "table-row"; // Unfortunately this is not possible with IE :-(
      $(this).show();
    });

    return this;
  };

  // Reveal a node by expanding all ancestors
  $.fn.reveal = function() {
    $(ancestorsOf($(this)).reverse()).each(function() {
      initialize($(this));
      $(this).expand().show();
    });

    return this;
  };

  // Add an entire branch to +destination+
  $.fn.appendBranchTo = function(destination) {
    var node = $(this);
    var parent = parentOf(node);

    var ancestorNames = $.map(ancestorsOf($(destination)), function(a) { return a.id; });

    // Conditions:
    // 1: +node+ should not be inserted in a location in a branch if this would
    //    result in +node+ being an ancestor of itself.
    // 2: +node+ should not have a parent OR the destination should not be the
    //    same as +node+'s current parent (this last condition prevents +node+
    //    from being moved to the same location where it already is).
    // 3: +node+ should not be inserted as a child of +node+ itself.
    if($.inArray(node[0].id, ancestorNames) == -1 && (!parent || (destination.id != parent[0].id)) && destination.id != node[0].id) {
      indent(node, ancestorsOf(node).length * options.indent * -1); // Remove indentation

      if(parent) { node.removeClass(options.childPrefix + parent[0].id); }

      node.addClass(options.childPrefix + destination.id);
      move(node, destination); // Recursively move nodes to new location
      indent(node, ancestorsOf(node).length * options.indent);
    }

    return this;
  };

  // Add reverse() function from JS Arrays
  $.fn.reverse = function() {
    return this.pushStack(this.get().reverse(), arguments);
  };

  // Toggle an entire branch
  $.fn.toggleBranch = function() {
    if($(this).hasClass("collapsed")) {
      $(this).expand();
    } else {
      $(this).removeClass("expanded").collapse();
    }

    return this;
  };

  // === Private functions

  function ancestorsOf(node) {
    var ancestors = [];
    while(node = parentOf(node)) {
      ancestors[ancestors.length] = node[0];
    }
    return ancestors;
  };

  function childrenOf(node) {
    return $(node).siblings("tr." + options.childPrefix + node[0].id);
  };

  function getPaddingLeft(node) {
    var paddingLeft = parseInt(node[0].style.paddingLeft, 10);
    return (isNaN(paddingLeft)) ? defaultPaddingLeft : paddingLeft;
  }

  function indent(node, value) {
    var cell = $(node.children("td")[options.treeColumn]);
    cell[0].style.paddingLeft = getPaddingLeft(cell) + value + "px";

    childrenOf(node).each(function() {
      indent($(this), value);
    });
  };

  function initialize(node) {
    if(!node.hasClass("initialized")) {
      node.addClass("initialized");

      var childNodes = childrenOf(node);

      if(!node.hasClass("parent") && childNodes.length > 0) {
        node.addClass("parent");
      }

      if(node.hasClass("parent")) {
        var cell = $(node.children("td")[options.treeColumn]);
        var padding = getPaddingLeft(cell) + options.indent;

        childNodes.each(function() {
          $(this).children("td")[options.treeColumn].style.paddingLeft = padding + "px";
        });

        if(options.expandable) {
          cell.prepend('<span style="margin-left: -' + options.indent + 'px; padding-left: ' + options.indent + 'px" class="expander"></span>');
          $(cell[0].firstChild).click(function() { node.toggleBranch(); });

          if(options.clickableNodeNames) {
            cell[0].style.cursor = "pointer";
            $(cell).click(function(e) {
              // Don't double-toggle if the click is on the existing expander icon
              if (e.target.className != 'expander') {
                node.toggleBranch();
              }
            });
          }

          // Check for a class set explicitly by the user, otherwise set the default class
          if(!(node.hasClass("expanded") || node.hasClass("collapsed"))) {
            node.addClass(options.initialState);
          }

          if(node.hasClass("expanded")) {
            node.expand();
          }
        }
      }
    }
  };

  function move(node, destination) {
    node.insertAfter(destination);
    childrenOf(node).reverse().each(function() { move($(this), node[0]); });
  };

  function parentOf(node) {
    var classNames = node[0].className.split(' ');

    for(key in classNames) {
      if(classNames[key].match(options.childPrefix)) {
        return $(node).siblings("#" + classNames[key].substring(options.childPrefix.length));
      }
    }
  };
})(jQuery);
;
/**
 * @file
 * Responsive table functionality.
 */

(function ($, Drupal, window) {

  'use strict';

  /**
   * Attach the tableResponsive function to {@link Drupal.behaviors}.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches tableResponsive functionality.
   */
  Drupal.behaviors.tableResponsive = {
    attach: function (context, settings) {
      var $tables = $(context).find('table.responsive-enabled').once('tableresponsive');
      if ($tables.length) {
        var il = $tables.length;
        for (var i = 0; i < il; i++) {
          TableResponsive.tables.push(new TableResponsive($tables[i]));
        }
      }
    }
  };

  /**
   * The TableResponsive object optimizes table presentation for screen size.
   *
   * A responsive table hides columns at small screen sizes, leaving the most
   * important columns visible to the end user. Users should not be prevented
   * from accessing all columns, however. This class adds a toggle to a table
   * with hidden columns that exposes the columns. Exposing the columns will
   * likely break layouts, but it provides the user with a means to access
   * data, which is a guiding principle of responsive design.
   *
   * @constructor Drupal.TableResponsive
   *
   * @param {HTMLElement} table
   *   The table element to initialize the responsive table on.
   */
  function TableResponsive(table) {
    this.table = table;
    this.$table = $(table);
    this.showText = Drupal.t('Show all columns');
    this.hideText = Drupal.t('Hide lower priority columns');
    // Store a reference to the header elements of the table so that the DOM is
    // traversed only once to find them.
    this.$headers = this.$table.find('th');
    // Add a link before the table for users to show or hide weight columns.
    this.$link = $('<button type="button" class="link tableresponsive-toggle"></button>')
      .attr('title', Drupal.t('Show table cells that were hidden to make the table fit within a small screen.'))
      .on('click', $.proxy(this, 'eventhandlerToggleColumns'));

    this.$table.before($('<div class="tableresponsive-toggle-columns"></div>').append(this.$link));

    // Attach a resize handler to the window.
    $(window)
      .on('resize.tableresponsive', $.proxy(this, 'eventhandlerEvaluateColumnVisibility'))
      .trigger('resize.tableresponsive');
  }

  /**
   * Extend the TableResponsive function with a list of managed tables.
   */
  $.extend(TableResponsive, /** @lends Drupal.TableResponsive */{

    /**
     * Store all created instances.
     *
     * @type {Array.<Drupal.TableResponsive>}
     */
    tables: []
  });

  /**
   * Associates an action link with the table that will show hidden columns.
   *
   * Columns are assumed to be hidden if their header has the class priority-low
   * or priority-medium.
   */
  $.extend(TableResponsive.prototype, /** @lends Drupal.TableResponsive# */{

    /**
     * @param {jQuery.Event} e
     *   The event triggered.
     */
    eventhandlerEvaluateColumnVisibility: function (e) {
      var pegged = parseInt(this.$link.data('pegged'), 10);
      var hiddenLength = this.$headers.filter('.priority-medium:hidden, .priority-low:hidden').length;
      // If the table has hidden columns, associate an action link with the
      // table to show the columns.
      if (hiddenLength > 0) {
        this.$link.show().text(this.showText);
      }
      // When the toggle is pegged, its presence is maintained because the user
      // has interacted with it. This is necessary to keep the link visible if
      // the user adjusts screen size and changes the visibility of columns.
      if (!pegged && hiddenLength === 0) {
        this.$link.hide().text(this.hideText);
      }
    },

    /**
     * Toggle the visibility of columns based on their priority.
     *
     * Columns are classed with either 'priority-low' or 'priority-medium'.
     *
     * @param {jQuery.Event} e
     *   The event triggered.
     */
    eventhandlerToggleColumns: function (e) {
      e.preventDefault();
      var self = this;
      var $hiddenHeaders = this.$headers.filter('.priority-medium:hidden, .priority-low:hidden');
      this.$revealedCells = this.$revealedCells || $();
      // Reveal hidden columns.
      if ($hiddenHeaders.length > 0) {
        $hiddenHeaders.each(function (index, element) {
          var $header = $(this);
          var position = $header.prevAll('th').length;
          self.$table.find('tbody tr').each(function () {
            var $cells = $(this).find('td').eq(position);
            $cells.show();
            // Keep track of the revealed cells, so they can be hidden later.
            self.$revealedCells = $().add(self.$revealedCells).add($cells);
          });
          $header.show();
          // Keep track of the revealed headers, so they can be hidden later.
          self.$revealedCells = $().add(self.$revealedCells).add($header);
        });
        this.$link.text(this.hideText).data('pegged', 1);
      }
      // Hide revealed columns.
      else {
        this.$revealedCells.hide();
        // Strip the 'display:none' declaration from the style attributes of
        // the table cells that .hide() added.
        this.$revealedCells.each(function (index, element) {
          var $cell = $(this);
          var properties = $cell.attr('style').split(';');
          var newProps = [];
          // The hide method adds display none to the element. The element
          // should be returned to the same state it was in before the columns
          // were revealed, so it is necessary to remove the display none value
          // from the style attribute.
          var match = /^display\s*\:\s*none$/;
          for (var i = 0; i < properties.length; i++) {
            var prop = properties[i];
            prop.trim();
            // Find the display:none property and remove it.
            var isDisplayNone = match.exec(prop);
            if (isDisplayNone) {
              continue;
            }
            newProps.push(prop);
          }
          // Return the rest of the style attribute values to the element.
          $cell.attr('style', newProps.join(';'));
        });
        this.$link.text(this.showText).data('pegged', 0);
        // Refresh the toggle link.
        $(window).trigger('resize.tableresponsive');
      }
    }
  });

  // Make the TableResponsive object available in the Drupal namespace.
  Drupal.TableResponsive = TableResponsive;

})(jQuery, Drupal, window);
;
