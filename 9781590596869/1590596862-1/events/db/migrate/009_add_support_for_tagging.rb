class AddSupportForTagging < ActiveRecord::Migration
  def self.up
    create_table :tags do |t|
      t.column :name, :string
    end

    create_table :taggings do |t|
      t.column :taggable_id,   :integer
      t.column :tag_id,        :integer
      t.column :taggable_type, :string
    end
  end

  def self.down
    drop_table :tags
    drop_table :taggings
  end
end