<?php
$pageTitle = __('Search Omeka ') . __('(%s total)', $total_results);
echo head(array('title' => $pageTitle, 'bodyclass' => 'browse'));
$searchRecordTypes = get_search_record_types();
$query = $_GET['query'];
?>
  <h5 style="font-variant:small-caps; text-align: center;">Search results for "<?php echo html_escape($query); ?>" (<?php echo $total_results; ?> items)</h5>
  <div class="container">
    <?php if ($total_results): ?>
      <?php foreach (loop('search_texts') as $searchText): ?>
      <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
      <?php $searchRecordType = $searchText['record_type']; ?>
      <?php if ($searchRecordType == 'Item' && metadata($record, 'item_type_name')): ?>
      <?php if (metadata($record, 'has_thumbnail')): ?>
      <?php echo "<div class=\"browse-items\">" . link_to_item(item_image('square_thumbnail', array(), 0, $record), array('class' => 'image'), 'show', $record); ?>
      <?php endif; ?>
      <?php elseif ($searchRecordType == 'Exhibit'): ?>
        <?php
            $exhibitId = $record->id;
            $exhibitItem = get_records('Item', array('exhibit' => $exhibitId, 'random' => true, 'has files' => true), 1);
            $exhibitImage = get_db()->getTable('File')->findWithImages($exhibitItem[0]->id, 0);
            echo link_to($record, 'show', file_image('square_thumbnails', array(), $exhibitImage), array('class' => 'permalink'));
        ?>
        <?php endif; ?>
    </div>
  <?php endforeach; ?>
        <?php else: ?>
    <div id="no-results">
        <p><?php echo __('Your query returned no results.');?></p>
<?php endif; ?>
</div>
<?php echo pagination_links(); ?>
<?php echo foot(); ?>
