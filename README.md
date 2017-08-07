# shopping-list
Shopping list, choose display items from master list, or add new items to master list.

Master shopping list is a single database table called "shoplist".

Displayed list is those rows of "shoplist" table that have boolean column "include" set to TRUE.

Hit (X) next to item to delete item from displayed list, while merely marking its "include" as FALSE in the master list.

Type an item in the text input and then hit (+) button to add an item to the display list.  It will be added to the master list if it's not already there.

